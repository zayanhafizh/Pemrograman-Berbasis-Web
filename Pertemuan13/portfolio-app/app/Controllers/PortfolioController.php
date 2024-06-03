<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PortfolioModel;

class PortfolioController extends BaseController
{
    public $helpers = [
        'form'
        ];
        public function create()
        {
            // jika HTTP method adalah "POST" dan data yang dikirim valid, maka akan melakukan proses selanjutnya
            if ($this->request->getMethod() === 'POST' && $this->validate([
                'title' => 'required',
                'description' => 'required',
                'image' => 'uploaded[image]|ext_in[image,png,jpg,jpeg]'
            ])) {
                    // menyimpan file gambar dari input file
                    $imageFile = $this->request->getFile('image');
                    $imageFileName = $imageFile->getRandomName();
                    $imageFile->move(ROOTPATH . 'public/images/',$imageFileName);
                    
                    // mengambil data entity portfolio dari request form
                    $portfolio = new \App\Entities\Portfolio();
                    $portfolio->title = $this->request->getPost('title');
                    
                    $portfolio->description = $this->request->getPost('description');
                    
                    $portfolio->image = "images/" . $imageFileName;
                    // menyimpan data entity portfolio ke tabel portfolios
                    
                    $model = model('App\Models\PortfolioModel');
                    $model->save($portfolio);
                    // redirect ke halaman dengan route `/portfolio` dengan mengeset flashdata untuk menampilkan pesan sukses
                    return redirect()->to('/portfolio')->with('success_message', 'Successfully create a new portfolio.');
            
            }
            // jika HTTP method adalah "POST" dan data yang dikirim tidak valid, maka akan mengirimkan pesan eror
            elseif ($this->request->getMethod() === 'POST') {
                return redirect()->to('/portfolio/create')->withInput()->with('errors', $this->validator->getErrors());
            }
            // handle untuk request dengan method "get"
            echo view('portfolio/create');
        }
    public function index()
    {
        // mengambil semua data porfolio dari tabel portfolios
        $model = new PortfolioModel();
        $portfolios = $model->findAll();
        $data = [
            'portfolios' => $portfolios
        ];

        // mengirimkan data portfolio ke View
        echo view('portfolio/index', $data);
    }
}
