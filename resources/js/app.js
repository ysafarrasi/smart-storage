import './bootstrap';
import { library, dom } from '@fortawesome/fontawesome-svg-core';
import { faPersonRifle, faGun, faUserShield } from '@fortawesome/free-solid-svg-icons';

// Tambahkan ikon spesifik ke pustaka
library.add(faPersonRifle, faGun, faUserShield);

// Aktifkan auto-find
dom.watch();


