import https from 'https'

export default function ({ $axios, $config }) {
  const { dev } = $config
  if (dev && dev.enable_ssl) {
    $axios.defaults.httpsAgent = new https.Agent({ rejectUnauthorized: false })
  }
}
