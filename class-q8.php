<?php

/**
 * Request to the q8 API and return the data needed.
 */
class Class_Q8 {

  /** @property APIURL $url */
  protected $url = 'https://www.q88.com/ws/api.asmx/GetQ88';

  /** @property AUTH_STRING $auth */
  protected $auth = '79A5719468B378FD0816C2BC856528A4';

  /**
   * Getting the vessel information
   *
   * @param string $vessel_name Designated Vessel Name.
   */
  public function show_vessel( String $vessel_name = '')
  {
      if ( empty( $vessel_name ) ) {
        return;
      }

      $vessel_name_encoded = urlencode( $vessel_name );

      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "{$this->url}?AuthorizationString={$this->auth }&VesselName={$vessel_name_encoded}",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
      ));

      $response = curl_exec($curl);

      curl_close($curl);
      return simplexml_load_string( $response );

  }
}