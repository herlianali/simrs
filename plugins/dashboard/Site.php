<?php

namespace Plugins\Dashboard;

use Systems\SiteModule;

class Site extends SiteModule
{


    public function routes()
    {
        // Simple:
        $this->route('main', 'getIndex');
    }

    public function getIndex()
    {

        $assign = [];
        $assign['notify']   = $this->core->getNotify();
        $assign['tanggal']       = getDayIndonesia(date('Y-m-d')).', '.dateIndonesia(date('Y-m-d'));
        $assign['powered']  = 'Powered by <a href="https://mlite.id/">mLITE</a>';
        $assign['version']       = $this->settings->get('settings.version');
        $assign['nama_instansi']         = $this->settings->get('settings.nama_instansi');
        $assign['logo']         = $this->settings->get('settings.logo');
        $assign['wallpaper']         = $this->settings->get('settings.wallpaper');
        $assign['theme_admin'] = $this->settings->get('settings.theme_admin');
        $assign['module_pasien'] = $this->db('mlite_modules')->where('dir', 'pasien')->oneArray();
        $assign['module_rawat_jalan'] = $this->db('mlite_modules')->where('dir', 'rawat_jalan')->oneArray();
        $assign['module_igd'] = $this->db('mlite_modules')->where('dir', 'igd')->oneArray();
        $assign['module_rawat_inap'] = $this->db('mlite_modules')->where('dir', 'rawat_inap')->oneArray();
        $assign['cek_anjungan'] = $this->db('mlite_modules')->where('dir', 'anjungan')->oneArray();
        $assign['presensi'] = $this->db('mlite_modules')->where('dir', 'presensi')->oneArray();
        echo $this->draw('main.html', ['mlite' => $assign]);
        exit();
    }

}