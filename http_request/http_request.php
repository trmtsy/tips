<?php
class HttpRequest {

    private $url        = '';
    private $params     = '';
    private $response   = '';
    private $statusCode = 0;

    public function setUrl($url) {
        $this->url = $url;
    }

    public function setParams($params) {
        $this->params = $params;
    }

    public function execute() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if (!empty($this->params)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($this->params));
        }

        $this->response = curl_exec($ch);
        $this->statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
    }

    public function getStatusCode() {
        return $this->statusCode;
    }

    public function getBody() {
        return $this->response;
    }

    public function getJsonDecode() {
        return @json_decode($this->response, true);
    }
}
