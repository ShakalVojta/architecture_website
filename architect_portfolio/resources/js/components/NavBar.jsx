import '../../css/Navbar.css';
import React, { useState } from 'react';
import {useNavigate} from "react-router-dom";

const NavBar = () => {
    const [menuOpen, setMenuOpen] = useState(false);
    const navigate = useNavigate();

    const toggleMenu = () => {
        setMenuOpen(!menuOpen);
    };

    const scrollToTop = () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
        navigate('/');
    };

    return (
        <header>
            <div className="header-container">
                <div className="header-left">
                    <h1 onClick={scrollToTop} style={{ cursor: 'pointer' }}>
                        architektka | Anna Laubová
                    </h1>
                </div>
                <div className="header-right">
                    {menuOpen ? (
                        <span className="menu-close" onClick={toggleMenu}>&times;</span>
                    ) : (
                        <span className="menu-open" onClick={toggleMenu}>&#10094;</span>
                    )}
                </div>
                <div className={`side-menu ${menuOpen ? 'open' : ''}`}>
                    <div className="menu-content">
                        <div className="menu-content-upper">
                            <p>Ing. arch. Anna Laubová</p>
                            <p>IČ: 08982279</p>
                            <p><a href="mailto:lauboann@gmail.com">lauboann@gmail.com</a></p>
                            <p><a href="https://annalaubova.com" target="_blank" rel="noopener noreferrer">annalaubova.com</a></p>
                            <p><a href="tel:+420607153114">+420 607 153 114</a></p>
                        </div>
                        <div className="menu-content-lower">
                            <p>Vidonín 21, 594 57 Vidonín</p>
                            <p>Štefánikova 229/5, 150 00 Praha 5</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    );
};

export default NavBar;
