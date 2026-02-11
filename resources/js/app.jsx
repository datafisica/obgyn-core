import './bootstrap';
import 'bootstrap/dist/css/bootstrap.css'; // Opcional, pero ayuda a la estructura

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();



import './bootstrap';
import React from 'react';
import ReactDOM from 'react-dom/client';
import Calendario from './components/Calendario'; // Importar el componente
import UserMenu from './components/UserMenu';

   console.log("Datos del usuario:");                
const root = ReactDOM.createRoot(document.getElementById('app-calendar'));
root.render(
    <React.StrictMode>
        <Calendario />
    </React.StrictMode>
);



const menuElement = document.getElementById('user-menu-react');
if (menuElement) {
    // AÑADE ESTO PARA DEPURAR
    console.log("Datos del usuario:", menuElement.dataset);                

    const root = ReactDOM.createRoot(menuElement);
    root.render(
        <UserMenu 
            userName={menuElement.dataset.username}
            profileRoute={menuElement.dataset.profileroute}
            logoutRoute={menuElement.dataset.logoutroute}
            csrfToken={menuElement.dataset.csrftoken}
        />
    );
} else {
    // AÑADE ESTO SI NO ENCUENTRA EL DIV
    console.error("No se encontró el elemento #user-menu-react");
}
