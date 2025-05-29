<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }
    public function index() {}
    public function sliderhome()
    {
        $rss = ['data' => [], 'total' => 0];
        $qs = $this->db->query("SELECT sliderhome_imagen AS img, sliderhome_imagen_mobile AS imgm FROM sliderhome WHERE sliderhome_activo=1 ORDER BY orden");
        $rss['total'] = $qs->num_rows();
        foreach ($qs->result() as $row) {
            $rss['data'][] = (array)$row;
        }
        $codigo = 200;
        if (!$qs) {
            $codigo = 403;
            $rss['error'] = 'Hubo un error procesando la consulta';
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($codigo)
            ->set_output(json_encode($rss));
    }
    public function page()
    {
        $rss = ['data' => [], 'total' => 0];
        $gt = $this->input->get('p');
        if (substr($gt, -1) == '/') {
        }
        $qs = $this->db->query("SELECT contenido_id, contenido_nombre, contenido_link, contenido_contenido FROM contenido WHERE contenido_link=? ORDER BY contenido_orden", array($gt));

        $rss['total'] = $qs->num_rows();
        foreach ($qs->result() as $row) {
            $contenido = [];
            $contenidojs = json_decode($row->contenido_contenido);
            foreach ($contenidojs as $cont) {
                $imagen = '';
                $bloque = 'col-span-2 md:col-span-3';
                $options = [];
                if (isset($cont->imagen)) {
                    $imagen = "https://www.atvarquitectos.com/upfiles/" . $cont->imagen[0];
                }
                if (isset($cont->bloque)) {
                    switch ($cont->bloque) {
                        case 'full':
                            $bloque = 'col-span-2 md:col-span-3';
                            break;
                        case '2/3':
                            $bloque = 'col-span-2';
                            break;
                        default:
                            $bloque = 'col-span-2 md:col-span-1';
                            break;
                    }
                }
                switch ($cont->tipo) {
                    case 21:
                        $componente = 'Columna';
                        break;
                    case 19:
                        $componente = 'ImagenFondo';
                        $bloque = 'col-span-2 md:col-span-3';
                        break;
                    case 22:
                        $componente = 'SensBloque';
                        $bloque = 'col-span-2 md:col-span-3';
                        break;
                    default:
                        $componente = 'Columna';
                        $bloque = 'col-span-2 md:col-span-3';
                        break;
                }
                if (isset($cont->texto)) {
                    $options['texto'] = $cont->texto;
                }
                if (isset($cont->h1)) {
                    $options['h1'] = $cont->h1;
                }
                if (isset($cont->link)) {
                    $options['link'] = $cont->link;
                }
                if (isset($cont->logo) && $cont->logo != '') {
                    $options['logo'] = "https://www.atvarquitectos.com/upfiles/" . $cont->logo[0];
                }
                $options['bloque'] = $bloque;
                $options['imagen'] = $imagen;
                $contenido[intval($cont->orden)] = [
                    "type" => $componente,
                    "order" => intval($cont->orden),
                    "options" => $options
                ];
            }
            function compareOrder($a, $b)
            {
                return $a['order'] - $b['order'];
            }
            usort($contenido, 'compareOrder');
            $rss['data'] = [
                'id' => $row->contenido_id,
                'nombre' => $row->contenido_nombre,
                'link' => $row->contenido_link,
                'comps' => $contenido
            ];
        }

        $codigo = 200;
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($codigo)
            ->set_output(json_encode($rss));
    }
    public function atv()
    {
        $rss = ['data' => [], 'slider' => [], 'gerencia' => [], 'equipo' => []];
        try {
            $qs = $this->db->query("SELECT * FROM atv LIMIT 1");
            foreach ($qs->result() as $row) {
                $rss['data'] = (array)$row;
                $rss['data']['img'] = ($row->imagen != '') ? "https://www.atvarquitectos.com/upfiles/" . $row->imagen : '';
            }
            $codigo = 200;
        } catch (Throwable $e) {
            $codigo = 403;
            $rss['error'] = 'Hubo un error procesando la consulta';
        }
        try {
            $qs = $this->db->query("SELECT * FROM slideratv ORDER BY slideratv_nombre");
            foreach ($qs->result() as $row) {
                $rss['slider'][] = array(
                    'name' => ($row->slideratv_imagen != '') ? "https://www.atvarquitectos.com/upfiles/" . $row->slideratv_imagen : '',
                    'texto' => $row->slideratv_texto
                );
            }
            $codigo = 200;
        } catch (Throwable $e) {
            $codigo = 403;
            $rss['error'] = 'Hubo un error procesando la consulta';
        }
        try {
            $qs = $this->db->query("SELECT * FROM equipo WHERE gerencia != 1 order BY orden");
            foreach ($qs->result() as $row) {
                $r = (array)$row;
                $rss['equipo'][$row->categoria][]  = [
                    "nombre" => $r['equipo_nombre'],
                    "cargo" => $r['cargo'],
                    "imagen" => ($row->imagen != '') ? "https://www.atvarquitectos.com/upfiles/" . $row->imagen : '',
                    "textolargo" => $r['texto']
                ];
            }
            $codigo = 200;
        } catch (Throwable $e) {
            $codigo = 403;
            $rss['error'] = 'Hubo un error procesando la consulta';
        }
        try {
            $qs = $this->db->query("SELECT * FROM equipo WHERE gerencia = 1");
            foreach ($qs->result() as $row) {
                $r = (array)$row;
                $r['imagen'] = ($row->imagen != '') ? "https://www.atvarquitectos.com/upfiles/" . $row->imagen : '';
                $rss['gerencia'][]  = [
                    "type" => "Equipo",
                    "name" => "Equipo",
                    "options" => [
                        "texto" => $r['equipo_nombre'],
                        "tipo" => 'col-1/3',
                        "imagen" => ($row->imagen != '') ? "https://www.atvarquitectos.com/upfiles/" . $row->imagen : '',
                        "textolargo" => $r['texto']
                    ]
                ];
            }
            $codigo = 200;
        } catch (Throwable $e) {
            $codigo = 403;
            $rss['error'] = 'Hubo un error procesando la consulta';
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($codigo)
            ->set_output(json_encode($rss));
    }
    public function home()
    {
        $rss = ['data' => [], 'slider' => []];
        try {
            $qs = $this->db->query("SELECT * FROM home LIMIT 1");
            foreach ($qs->result() as $row) {
                $rss['data'] = array(
                    "home_nombre" => $row->home_nombre,
                    "teamimg" => ($row->teamimg != '') ? "https://www.atvarquitectos.com/upfiles/" . $row->teamimg : '',
                    "teamtext" => $row->teamtext,
                    "cita" => $row->cita,
                    "cita2" => $row->cita2,
                    "linkcita" => $row->linkcita,
                    "projectimg" => ($row->projectimg != '') ? "https://www.atvarquitectos.com/upfiles/" . $row->projectimg : '',
                    "projecttexto" => $row->projecttexto,
                    "projectlink" => $row->projectlink
                );
                $rss['data']['notes'] = [];
                for ($a = 1; $a <= 4; $a++) {
                    if ($row->{"coltit" . $a} != '') {
                        $rss['data']['notes'][] = array(
                            'id' => $a,
                            'title' =>  $row->{"coltit" . $a},
                            'text' =>  $row->{"coltxt" . $a},
                            'link' =>  $row->{"collink" . $a},
                            'image' => ($row->{"colimg" . $a} != '') ? "https://www.atvarquitectos.com/upfiles/" . $row->{"colimg" . $a} : ''
                        );
                    }
                }
            }
            $codigo = 200;
        } catch (Throwable $e) {
            $codigo = 403;
            $rss['error'] = 'Hubo un error procesando la consulta';
        }
        try {
            $qs = $this->db->query("SELECT * FROM sliderhome ORDER BY orden");
            foreach ($qs->result() as $row) {
                $rss['slider'][] = array(
                    'name' => ($row->sliderhome_imagen != '') ? "https://www.atvarquitectos.com/upfiles/" . $row->sliderhome_imagen : '',
                    'mobile' => ($row->sliderhome_imagen_mobile != '') ? "https://www.atvarquitectos.com/upfiles/" . $row->sliderhome_imagen_mobile : "https://www.atvarquitectos.com/upfiles/" . $row->sliderhome_imagen,
                    'texto' =>  $row->sliderhome_texto
                );
            }
            $codigo = 200;
        } catch (Throwable $e) {
            $codigo = 403;
            $rss['error'] = 'Hubo un error procesando la consulta';
        }


        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($codigo)
            ->set_output(json_encode($rss));
    }
    public function menu()
    {
        $rss = [
            ['link' => '/atv', 'text' => 'ATV'],
            ['link' => '/arquitectura', 'text' => 'ARQUITECTURA'],
            ['link' => '/urbanismo', 'text' => 'URBANISMO'],
            ['link' => '/sens', 'text' => 'SENS'],
            ['link' => '/liv', 'text' => 'LIV'],
            ['link' => '/dialogos', 'text' => 'DIÁLOGOS'],
            ['link' => '/contacto', 'text' => 'CONTACTO'],
        ];
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($rss));
    }
    public function publicaciones()
    {
        setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');

        $rss = ['data' => [], 'total' => 0];
        try {
            $sql = "SELECT * FROM publicacion WHERE activo=1";
            if ($this->input->get("limit")) {
                $sql .= " LIMIT " . intval($this->input->get("limit"));
            }
            $qs = $this->db->query($sql);
            $rss['total'] = $qs->num_rows();
            foreach ($qs->result() as $row) {
                $key = 'data';

                $rss[$key][] = [
                    'nombre' => $row->publicacion_nombre,
                    'titulo' => $row->titulo,
                    'categoria' => $row->categoria,
                    'texto' => $row->texto,
                    'link' => "/publicaciones/" . $row->slug,
                    'imagen' => ($row->imagen != '') ? "https://www.atvarquitectos.com/upfiles/" . $row->imagen : '',
                ];
            }
            $codigo = 200;
        } catch (Throwable $e) {
            $codigo = 403;
            $rss['error'] = 'Hubo un error procesando la consulta';
        }

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($codigo)
            ->set_output(json_encode($rss));
    }
    public function dialogos()
    {
        setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');

        $rss = ['data' => [], 'destacado' => [], 'total' => 0, 'categorias' => []];
        $tamanios = array(1 => 'col-span-2', 6 => 'col-span-3', 8 => 'col-span-2', 12 => 'col-span-2', 15 => 'col-span-2');
        try {
            $sql = "SELECT * FROM dialogo WHERE activo=1";
            $sql .= " ORDER BY fecha DESC";
            if ($this->input->get("limit")) {
                $sql .= " LIMIT " . intval($this->input->get("limit"));
            }
            $qs = $this->db->query($sql);
            $rss['total'] = $qs->num_rows();
            $x = 1;
            foreach ($qs->result() as $row) {
                $key = 'data';
                if ($row->destacado == 1) {
                    //$key = 'destacado';
                }
                $rss['categorias'][$row->dialogotipo] = $row->dialogotipo;
                $itt = [
                    'titulo' => $row->dialogo_nombre,
                    'categoria' => $row->dialogotipo,
                    'fecha' => iconv('ISO-8859-2', 'UTF-8', strftime("%d de %B de %Y", strtotime($row->fecha))),
                    'horario' => $row->horario,
                    'oradores' => $row->oradores,
                    'texto' => $row->texto,
                    'class' => (isset($tamanios[$x]) ? $tamanios[$x] : ''),
                    'link' => "/dialogos/" . $row->slug,
                    'type' => 1,
                    'imagen' => ($row->foto != '') ? "https://www.atvarquitectos.com/upfiles/" . $row->foto : '',
                ];
                $rss[$key][] = $itt;

                if ($row->destacado == 1) {
                    $rss['destacado'][] = $itt;
                }
                $x++;
            }
            $codigo = 200;
        } catch (Throwable $e) {
            $codigo = 403;
            $rss['error'] = 'Hubo un error procesando la consulta';
        }

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($codigo)
            ->set_output(json_encode($rss));
    }
    public function publicacion()
    {
        setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');

        $rss = ['data' => [], 'total' => 0];
        try {
            $qs = $this->db->query("SELECT * FROM publicacion WHERE slug=?", array($this->input->get('slug')));
            $rss['total'] = $qs->num_rows();
            foreach ($qs->result() as $row) {
                $key = 'data';
                $rss[$key] = [
                    'titulo' => $row->publicacion_nombre,
                    'autores' => $row->autores,
                    'categoria' => $row->categoria,
                    'anio' => $row->anio,
                    'linkcomprar' => $row->linkcomprar,
                    'texto' => $row->texto,
                    'contenido' => $row->contenido,
                    'donde_comprar' => $row->donde_comprar,
                    'imagen' => ($row->imagen != '') ? "https://www.atvarquitectos.com/upfiles/" . $row->imagen : '',
                ];
                for ($a = 1; $a <= 6; $a++) {
                    if ($row->{'imagen' . $a} != '') {
                        $rss[$key]['slider'][] = ['name' => "https://www.atvarquitectos.com/upfiles/" . $row->{'imagen' . $a}];
                    }
                }
            }
            $codigo = 200;
        } catch (Throwable $e) {
            $codigo = 403;
            $rss['error'] = 'Hubo un error procesando la consulta';
        }

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($codigo)
            ->set_output(json_encode($rss));
    }
    public function dialogo()
    {
        setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');

        $rss = ['data' => [], 'destacado' => [], 'total' => 0];
        try {
            $qs = $this->db->query("SELECT * FROM dialogo WHERE slug=?", array($this->input->get('slug')));
            $rss['total'] = $qs->num_rows();
            foreach ($qs->result() as $row) {
                $key = 'data';
                $contenido = [];
                $contenidojs = json_decode($row->contenido);
                if ($contenidojs)
                    foreach ($contenidojs as $cont) {
                        $imagen = '';
                        $bloque = 'col-span-2 md:col-span-3';
                        $options = [];
                        if (isset($cont->imagen)) {
                            $imagen = "https://www.atvarquitectos.com/upfiles/" . $cont->imagen[0];
                        }
                        if (isset($cont->bloque)) {
                            switch ($cont->bloque) {
                                case 'full':
                                    $bloque = 'col-span-2 md:col-span-3';
                                    break;
                                case '2/3':
                                    $bloque = 'col-span-2';
                                    break;
                                default:
                                    $bloque = 'col-span-2 md:col-span-1';
                                    break;
                            }
                        }
                        $galkey = 'slides';
                        switch ($cont->tipo) {
                            case 21:
                                $componente = 'Columna';
                                break;
                            case 19:
                                $componente = 'ImagenFondo';
                                $bloque = 'col-span-2 md:col-span-3';
                                break;
                            case 22:
                                $componente = 'FichaBloque';
                                $bloque = 'col-span-2 md:col-span-3';
                                $options['tipo'] = $bloque;
                                break;
                            case 23:
                                $componente = 'SensBloque';
                                $bloque = 'col-span-2 md:col-span-3';
                                $options['tipo'] = $bloque;
                                break;
                            case 29:
                                $componente = 'LivBloque';
                                $bloque = 'col-span-2 md:col-span-3';
                                $options['tipo'] = $bloque;
                                break;
                            case 24:
                                $componente = 'ProjectInfo';
                                $bloque = 'col-span-2 md:col-span-3';
                                $options['tipo'] = $bloque;
                                break;
                            case 25:
                                $componente = 'Carousel';
                                $bloque = 'col-span-2 md:col-span-3';
                                $options['tipo'] = $bloque;
                                break;
                            case 26:
                                $componente = 'TextoFoto';
                                $bloque = 'col-span-2 md:col-span-3';
                                $options['tipo'] = $bloque;
                                $galkey = 'imagenes';
                                break;
                            case 27:
                                $componente = 'DobleTexto';
                                $bloque = 'col-span-2 md:col-span-3';
                                $options['tipo'] = $bloque;
                                break;
                            case 28:
                                $componente = 'TextoImagenDialogo';
                                $bloque = 'col-span-2 md:col-span-3';
                                $options['tipo'] = $bloque;
                                if (isset($cont->bloque)) {
                                    switch ($cont->bloque) {
                                        case 'full':
                                            $options['tamaniofoto'] = 'w-full';
                                            break;
                                        case '75%':
                                            $options['tamaniofoto'] = 'w-3/4';
                                            break;
                                        case '50%':
                                            $options['tamaniofoto'] = 'w-1/2';
                                            break;
                                        default:
                                            $options['tamaniofoto'] = 'w-full';
                                            break;
                                    }
                                }
                                break;
                            default:
                                $componente = 'Columna';
                                $bloque = 'col-span-2 md:col-span-3';
                                break;
                        }
                        $rules = array(
                            // '/(#+)(.*)/e' => 'self::header (\'\\1\', \'\\2\')',       // headers
                            '/\[([^\[]+)\]\(([^\)]+)\)/' => '<a href=\'\2\'>\1</a>',  // links
                            '/(\*\*|__)(.*?)\1/' => '<strong>\2</strong>',            // bold
                            '/(\*|_)(.*?)\1/' => '<em>\2</em>',                       // emphasis
                            '/\~\~(.*?)\~\~/' => '<del>\1</del>',                     // del
                            '/\:\"(.*?)\"\:/' => '<q>\1</q>',                         // quote
                            // '/\n\*(.*)/e' => 'self::ul_list (\'\\1\')',               // ul lists
                            // '/\n[0-9]+\.(.*)/e' => 'self::ol_list (\'\\1\')',         // ol lists
                            // '/\n&gt;(.*)/e' => 'self::blockquote (\'\\1\')',          // blockquotes
                            // '/\n([^\n]+)\n/e' => 'self::para (\'\\1\')',              // add paragraphs
                            '/<\/ul><ul>/' => '',                                     // fix extra ul
                            '/<\/ol><ol>/' => '',                                     // fix extra ol
                            '/<\/blockquote><blockquote>/' => "\n"                    // fix extra blockquote
                        );
                        $fields = array('texto', 'ubicacion', 'ciudad', 'superficie', 'anio', 'h1', 'link', 'texto1', 'texto2', 'alttext');
                        foreach ($fields as $field) {
                            if (isset($cont->{$field})) {
                                $text = $cont->{$field};
                                foreach ($rules as $regex => $replacement) {
                                    $text = preg_replace($regex, $replacement, $text);
                                }
                                $options[$field] = $text;
                            }
                        }

                        $ifields = array('logo', 'foto1', 'foto2', 'foto3', 'imagen');

                        foreach ($ifields as $field) {
                            if (isset($cont->{$field}) && $cont->{$field} != '') {
                                if (count($cont->{$field}) == 1) {
                                    $options[$field] = "https://www.atvarquitectos.com/upfiles/" . $cont->{$field}[0];
                                }
                            }
                        }

                        if (isset($cont->galeria) && !empty($cont->galeria)) {
                            $options[$galkey] = [];
                            foreach ($cont->galeria as $gal) {
                                $options[$galkey][] = ['name' => "https://www.atvarquitectos.com/upfiles/" . $gal];
                            }
                        }


                        $options['bloque'] = $bloque;
                        $options['imagen'] = $imagen;
                        $contenido[intval($cont->orden)] = [
                            "type" => $componente,
                            "order" => intval($cont->orden),
                            "options" => $options
                        ];
                    }
                function compareOrder($a, $b)
                {
                    return $a['order'] - $b['order'];
                }
                usort($contenido, 'compareOrder');
                $rss[$key] = [
                    'titulo' => $row->dialogo_nombre,
                    'autor' => $row->dialogo_autor,
                    'categoria' => $row->dialogotipo,
                    'fecha' => iconv('ISO-8859-2', 'UTF-8', strftime("%d de %B de %Y", strtotime($row->fecha))),
                    'horario' => $row->horario,
                    'oradores' => $row->oradores,
                    'texto' => $row->texto,
                    'seo_description' => $row->seo_description,
                    'seo_title' => $row->seo_title,
                    'contenido' => $contenido,
                    'link' => "/dialogos/" . $row->slug,
                    'type' => 1,
                    'imagen' => ($row->imagen != '') ? "https://www.atvarquitectos.com/upfiles/" . $row->imagen : '',
                ];
            }
            $codigo = 200;
        } catch (Throwable $e) {
            $codigo = 403;
            $rss['error'] = 'Hubo un error procesando la consulta';
        }

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($codigo)
            ->set_output(json_encode($rss));
    }
    public function proyecto()
    {
        $rss = ['data' => [], 'total' => 0];
        try {
            $qs = $this->db->query("SELECT * FROM proyecto WHERE slug=?", array($this->input->get('slug')));
            $rss['total'] = $qs->num_rows();
            foreach ($qs->result() as $row) {
                $contenido = [];
                $contenidojs = json_decode($row->contenido);
                foreach ($contenidojs as $cont) {
                    $imagen = '';
                    $bloque = 'col-span-2 md:col-span-3';
                    $options = [];
                    if (isset($cont->imagen)) {
                        $imagen = "https://www.atvarquitectos.com/upfiles/" . $cont->imagen[0];
                    }
                    if (isset($cont->bloque)) {
                        switch ($cont->bloque) {
                            case 'full':
                                $bloque = 'col-span-2 md:col-span-3';
                                break;
                            case '2/3':
                                $bloque = 'col-span-2';
                                break;
                            default:
                                $bloque = 'col-span-2 md:col-span-1';
                                break;
                        }
                    }
                    $galkey = 'slides';
                    switch ($cont->tipo) {
                        case 21:
                            $componente = 'Columna';
                            break;
                        case 19:
                            $componente = 'ImagenFondo';
                            $bloque = 'col-span-2 md:col-span-3';
                            break;
                        case 22:
                            $componente = 'FichaBloque';
                            $bloque = 'col-span-2 md:col-span-3';
                            $options['tipo'] = $bloque;
                            break;
                        case 23:
                            $componente = 'SensBloque';
                            $bloque = 'col-span-2 md:col-span-3';
                            $options['tipo'] = $bloque;
                            break;
                        case 29:
                            $componente = 'LivBloque';
                            $bloque = 'col-span-2 md:col-span-3';
                            $options['tipo'] = $bloque;
                            break;
                        case 24:
                            $componente = 'ProjectInfo';
                            $bloque = 'col-span-2 md:col-span-3';
                            $options['tipo'] = $bloque;
                            break;
                        case 25:
                            $componente = 'Carousel';
                            $bloque = 'col-span-2 md:col-span-3';
                            $options['tipo'] = $bloque;
                            break;
                        case 26:
                            $componente = 'TextoFoto';
                            $bloque = 'col-span-2 md:col-span-3';
                            $options['tipo'] = $bloque;
                            $galkey = 'imagenes';
                            break;
                        case 30:
                            $componente = 'TextoDestacado';
                            $bloque = 'col-span-2 md:col-span-3';
                            $options['tipo'] = $bloque;
                            break;
                        case 31:
                            $componente = 'Proyecto3Bloques';
                            $bloque = 'col-span-2 md:col-span-3';
                            $options['tipo'] = $bloque;
                            break;
                        case 32:
                            $componente = 'Proyecto5Bloques';
                            $bloque = 'col-span-2 md:col-span-3';
                            $options['tipo'] = $bloque;
                            break;
                        case 33:
                            $componente = 'floatingbtn';
                            $bloque = 'floatingbtn';
                            $options['tipo'] = $bloque;
                            break;
                        default:
                            $componente = 'Columna';
                            $bloque = 'col-span-2 md:col-span-3';
                            break;
                    }
                    $fields = array('texto', 'ubicacion', 'ciudad', 'superficie', 'anio', 'h1', 'link', 'texto1', 'texto2', 'texto3', 'codigo');
                    foreach ($fields as $field) {
                        if (isset($cont->{$field})) {
                            $options[$field] = $cont->{$field};
                        }
                    }

                    $ifields = array('logo', 'imagen');

                    foreach ($ifields as $field) {
                        if (isset($cont->{$field}) && $cont->{$field} != '') {
                            if (count($cont->{$field}) == 1) {
                                $options[$field] = "https://www.atvarquitectos.com/upfiles/" . $cont->{$field}[0];
                            }
                        }
                    }

                    if (isset($cont->imagen1) && !empty($cont->imagen1)) {
                        $options['imagen1'] = [];
                        foreach ($cont->imagen1 as $gal) {
                            $options['imagen1'] = "https://www.atvarquitectos.com/upfiles/" . $gal;
                        }
                    }
                    if (isset($cont->foto1) && !empty($cont->foto1)) {
                        $options['foto1'] = [];
                        foreach ($cont->foto1 as $gal) {
                            $options['foto1'][] = ['name' => "https://www.atvarquitectos.com/upfiles/" . $gal];
                        }
                    }
                    if (isset($cont->foto2) && !empty($cont->foto2)) {
                        $options['foto2'] = [];
                        foreach ($cont->foto2 as $gal) {
                            $options['foto2'][] = ['name' => "https://www.atvarquitectos.com/upfiles/" . $gal];
                        }
                    }
                    if (isset($cont->foto3) && !empty($cont->foto3)) {
                        $options['foto3'] = [];
                        foreach ($cont->foto3 as $gal) {
                            $options['foto3'][] = ['name' => "https://www.atvarquitectos.com/upfiles/" . $gal];
                        }
                    }
                    if (isset($cont->galeria) && !empty($cont->galeria)) {
                        $options[$galkey] = [];
                        foreach ($cont->galeria as $gal) {
                            $options[$galkey][] = ['name' => "https://www.atvarquitectos.com/upfiles/" . $gal];
                        }
                    }


                    $options['bloque'] = $bloque;
                    $options['imagen'] = $imagen;
                    $contenido[intval($cont->orden)] = [
                        "type" => $componente,
                        "order" => intval($cont->orden),
                        "options" => $options
                    ];
                }
                function compareOrder($a, $b)
                {
                    return $a['order'] - $b['order'];
                }
                usort($contenido, 'compareOrder');
                $rss['data'] = [
                    'id' => $row->proyecto_id,
                    'nombre' => $row->proyecto_nombre,
                    'comps' => $contenido
                ];
            }
            $codigo = 200;
        } catch (Throwable $e) {
            $codigo = 403;
            $rss['error'] = 'Hubo un error procesando la consulta';
        }
        $codigo = 200;
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($codigo)
            ->set_output(json_encode($rss));
    }
}
