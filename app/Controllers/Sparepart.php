<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SparepartModel;

class Sparepart extends Controller
{
    /**
     * index function
     */
    public function index()
    {
        //model initialize
        $sparepartModel = new SparepartModel();

        //pager initialize
        $pager = \Config\Services::pager();

        $data = array(
            'posts' => $sparepartModel->paginate(2, 'post'),
            'pager' => $sparepartModel->pager
        );

        return view('sparepart-index', $data);
    }

    /**
     * create function
     */
    public function create()
    {
        return view('sparepart-create');
    }

    /**
     * store function
     */
    public function store()
    {
        //load helper form and URL
        helper(['form', 'url']);
         
        //define validation
        $validation = $this->validate([
            'name' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nama Sparepart.'
                ]
            ],
            'desc'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Deskripsi Sparepart.'
                ]
            ],
            'price'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Harga Sparepart.'
                ]
            ],
        ]);

        if(!$validation) {

            //render view with error validation message
            return view('sparepart-create', [
                'validation' => $this->validator
            ]);

        } else {

            //model initialize
            $postModel = new SparepartModel();
            
            //insert data into database
            $postModel->insert([
                'name'   => $this->request->getPost('name'),
                'desc' => $this->request->getPost('desc'),
                'price' => $this->request->getPost('price'),
            ]);

            //flash message
            session()->setFlashdata('message', 'Sparepart Berhasil Disimpan');

            return redirect()->to(base_url('sparepart'));
        }

    }

    /**
     * edit function
     */
    public function edit($id)
    {
        //model initialize
        $postModel = new SparepartModel();

        $data = array(
            'post' => $postModel->find($id)
        );

        return view('sparepart-edit', $data);
    }

    /**
     * update function
     */
    public function update($id)
    {
        //load helper form and URL
        helper(['form', 'url']);
        
        //define validation
        $validation = $this->validate([
            'name' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nama Sparepart.'
                ]
            ],
            'desc'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Deskripsi Sparepart.'
                ]
            ],
            'price'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Harga Sparepart.'
                ]
            ],
        ]);

        if(!$validation) {

            //model initialize
            $postModel = new SparepartModel();

            //render view with error validation message
            return view('sparepart-edit', [
                'post' => $postModel->find($id),
                'validation' => $this->validator
            ]);

        } else {

            //model initialize
            $postModel = new SparepartModel();
            
            //insert data into database
            $postModel->update($id, [
                'name'   => $this->request->getPost('name'),
                'desc' => $this->request->getPost('desc'),
                'price' => $this->request->getPost('price'),
            ]);

            //flash message
            session()->setFlashdata('message', 'Sparepart Berhasil Diupdate');

            return redirect()->to(base_url('sparepart'));
        }

    }

    /**
     * delete function
     */
    public function delete($id)
    {
        //model initialize
        $postModel = new SparepartModel();

        $post = $postModel->find($id);

        if($post) {
            $postModel->delete($id);

            //flash message
            session()->setFlashdata('message', 'Sparepart Berhasil Dihapus!');

            return redirect()->to(base_url('sparepart'));
        }
    }

}