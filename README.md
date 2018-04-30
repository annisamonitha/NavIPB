# NavIPB
Buat database namanya dbci3. Nah, terus buat tabel. 
Klik menu SQL di PHPMyadmin.

Terus paste in ini :
 
 CREATE TABLE IF NOT EXISTS `users` (   
  `id_user` int(11) NOT NULL AUTO_INCREMENT,   
  `nama` varchar(100) NOT NULL,   
  `email` varchar(255) NOT NULL,   
  `username` varchar(32) NOT NULL,   
  `password` varchar(64) NOT NULL,   
  PRIMARY KEY (`id_user`),   
  UNIQUE KEY `email` (`email`)   
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ; 
  
  
  
  terus klik tombol go ya guysss
