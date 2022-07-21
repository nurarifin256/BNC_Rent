<?php
defined('BASEPATH') or exit('No direct script access allowed');


use chriskacerguis\RestServer\RestController;

class Driver extends RestController
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }

    public function index_get($id = 0)
    {
        $check_data = $this->Model_driver->get_data_supir_byId($id)->row_array();

        if ($id) {
            if ($check_data) {
                $data = $check_data;
                $this->response($data, RestController::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'data tidak di temukan'
                ], 404);
            }
        } else {
            $data = $this->Model_driver->GetSemuaData()->result_array();
            $this->response($data, RestController::HTTP_OK);
        }
    }

    public function index_post()
    {
        $data = [
            'nama_supir' => $this->post('nama_supir'),
            'no_handphone' => $this->post('no_handphone'),
            'alamat' => $this->post('alamat'),
            'status' => $this->post('status'),
        ];

        $this->Model_driver->Simpan_data_supir($data);
        $this->response($data, RestController::HTTP_OK);

        // if (!empty($insert)) {
        //     $this->response($data, RestController::HTTP_OK);
        // } else {
        //     $this->response([
        //         'status' => false,
        //         'message' => 'data gagal di simpan'
        //     ], 502);
        // }
    }

    public function index_put()
    {
        $id_supir = $this->put('id_supir');
        $data = [
            'nama_supir' => $this->put('nama_supir'),
            'no_handphone' => $this->put('no_handphone'),
            'alamat' => $this->put('alamat'),
            'status' => $this->put('status'),
        ];

        $check_data = $this->Model_driver->get_data_supir_byId($id_supir)->row_array();

        if ($check_data) {
            $this->Model_driver->Ubah_data_supir($id_supir, $data);
            $this->response($data, RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'data tidak di temukan'
            ], 404);
        }
    }
}
