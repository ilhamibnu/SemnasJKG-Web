<?php

if (isset($_SESSION["ses_username"]) == "") {

  echo " 

  <div class='collapse navbar-collapse h-auto' id='navbarSupportedContent'>
  <ul class='navbar-nav ml-auto menu'>
    <li><a href='index'>Beranda</a></li>
    <li><a href='semnas'>Tentang Semnas</a></li>
    <li><a href='infografis'>Infografis</a></li>
    <li><a href='kontak'>Hubungi Kami</a></li>
    <li>
      <a href='login' class='btn secondary-solid-btn check-btn'>Login or Register</a>
    </li>
  </ul>
</div>
  
  ";
} else {

  echo " 
  <div class='collapse navbar-collapse h-auto' id='navbarSupportedContent'>
  <ul class='navbar-nav ml-auto menu'>
    <li><a href='index'>Beranda</a></li>
    <li><a href='semnas'>Tentang Semnas</a></li>
    <li><a href='infografis'>Infografis</a></li>
    <li><a href='kontak'>Hubungi Kami</a></li>
    <li><a href='#' class='dropdown-toggle'>$data_nama</a>
    <ul class='sub-menu'>
      <li><a href='seminar'>Seminar Anda</a>
      </li>
      <li><a href='e-sertifikat'>Unduh E-Sertifikat</a></li>
      <li><a href='profil' data-bs-toggle='modal' data-bs-target='#ModalProfil'>Profil</a></li>
      <li><a href='logout' data-bs-toggle='modal' data-bs-target='#LogoutModal'>Logout</a></li>
    </ul>
  </li>
  </ul>
</div>
  
  ";
}
