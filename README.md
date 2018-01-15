SIM-MISTIK
===============================

Sistem Informasi Manajemen Mitra Statistik (SIM-MISTIK) adalah sistem yang memungkinkan penggunanya untuk merekam track record mitra yang digunakan dalam kegiatan statistik (pencacahan dan pengolahan).

Dokumentasi dan panduan penggunaan dapat dilihat pada http://s.bps.go.id/simmistik
Sistem ini Insya Allah akan terus diperbaiki. Jika terdapat kendala, pertanyaan, atau ide, Anda dapat membuat issue baru atau menghubungi saya di eko.lestari@bps.go.id atau lestari.ekowahyu@gmail.com



BUGs Fixed
===========================
- User can not log out
        add  
            'site/login',
            'site/logout',
            'site/index',
        in the allowed action part on common\config\main.php