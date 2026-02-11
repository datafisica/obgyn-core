// resources/js/components/UserMenu.jsx
import { useState, useRef, useEffect } from 'react';

export default function UserMenu({ userName, profileRoute, logoutRoute, csrfToken }) {
    const [isOpen, setIsOpen] = useState(false);
    const menuRef = useRef(null);

    // Cerrar menú al hacer clic fuera
    useEffect(() => {
        function handleClickOutside(event) {
            if (menuRef.current && !menuRef.current.contains(event.target)) {
                setIsOpen(false);
            }
        }
        document.addEventListener("mousedown", handleClickOutside);
        return () => document.removeEventListener("mousedown", handleClickOutside);
    }, [menuRef]);

    return (
        <div className="relative" ref={menuRef}>
            {/* Botón Gerald */}
            <div onClick={() => setIsOpen(!isOpen)}>
                <button className="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                    <div>{userName}</div>
                    <div className="ms-1">
                        <svg className="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd" />
                        </svg>
                    </div>
                </button>
            </div>

            {/* Menú Desplegable */}
            {isOpen && (
                <div className="absolute z-50 mt-2 w-48 rounded-md shadow-lg ltr:origin-top-right rtl:origin-top-left end-0">
                    <div className="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">
                        <a className="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" href={profileRoute}>
                            Profile
                        </a>

                        {/* Authentication */}
                        <form method="POST" action={logoutRoute}>
                            <input type="hidden" name="_token" value={csrfToken} />
                            <a className="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" 
                               href={logoutRoute}
                               onClick={(e) => {
                                   e.preventDefault();
                                   e.target.closest('form').submit();
                               }}>
                                Log Out
                            </a>
                        </form>
                    </div>
                </div>
            )}
        </div>
    );
}
