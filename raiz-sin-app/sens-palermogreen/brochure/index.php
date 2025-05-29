<?php
header("Content-type:application/pdf");

// It will be called downloaded.pdf
header("Content-Disposition:attachment;filename=Sens_Brochure_Digital.pdf");

// The PDF source is in original.pdf
readfile("Sens_Brochure_Digital.pdf");
?>