<?php


class IPLocalizador
{
    /**
     *
     * @param string $ip
     * @return IPLocalizadorData
     */
    static function getCountry($ip_address)
    {
        $url = "http://ip-to-country.webhosting.info/node/view/36";
        $inici = "src=/flag/?type=2&cc2=";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, "POST");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "ip_address=$ip_address");

        ob_start();

        curl_exec($ch);
        curl_close($ch);
        $cache = ob_get_contents();
        ob_end_clean();

        $resto = strstr($cache, $inici);
        $pais = substr($resto, strlen($inici), 1);

        return $pais;
    }
}