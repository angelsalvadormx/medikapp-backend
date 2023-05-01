<?php
/*
 * Clase que sirve para realizar consultas, altas y bajas a la tabla usuario.
 */
class User
{
  /*
   * @var Object $data
   */
  private $data;
  public function __construct($data)
  {
    $this->data = $data;
  }

  /*
   * Obtiene todos los registros de la tabla, pero solo del id_crread que esta en la session
   * @return Object.
   */
  public function getAll()
  {
    // $mysqli = new HelperMysql(
    //   DATABASE_HOST,
    //   DATABASE_USER,
    //   DATABASE_PASSWORD,
    //   DATABASE_NAME
    // );
    $response = array();
    $sql = "SELECT * FROM TABLE_NAME";
    // $mysqli->query($sql);
    // $response = $mysqli->fetch_all();
    // $mysqli->close();
    return (object) $response;
  }
}
  