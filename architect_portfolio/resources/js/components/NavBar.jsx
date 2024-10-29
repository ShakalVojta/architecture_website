import '../../css/Navbar.css';
import React, { useState } from 'react';
import {useNavigate} from "react-router-dom";
import photo from '../../../public/storage/architect.jpg'

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
                    <h1 onClick={scrollToTop} style={{cursor: 'pointer'}}>
                        architektka | Anna Laubová
                    </h1>
                </div>
                <div className="header-right">
                    {menuOpen ? (
                        <span className="menu-close" onClick={toggleMenu}>&times;</span>
                    ) : (
                        <span className="menu-open" onClick={toggleMenu}>
<a data-testid="linkElement" data-popupid="uqqmf" target="_self" role="button" className="a9YhBi" tabIndex="0"><div
    data-testid="svgRoot-comp-l1eylqvj" className="AKxYR5 VZYmYf comp-l1eylqvj"><svg preserveAspectRatio="none"
                                                                                     data-bbox="76.224 19.871 47.552 160.259"
                                                                                     viewBox="76.224 19.871 47.552 160.259"
                                                                                     height="43" width="30"
                                                                                     xmlns="http://www.w3.org/2000/svg"
                                                                                     data-type="shape"
                                                                                     role="presentation"
                                                                                     aria-hidden="true" aria-label="">
    <g>
        <path
            d="M121.135 180.13a2.643 2.643 0 0 1-2.324-1.379l-42.264-77.488a2.637 2.637 0 0 1 0-2.53l42.263-77.485a2.646 2.646 0 0 1 3.586-1.056 2.642 2.642 0 0 1 1.056 3.586l-41.575 76.22 41.575 76.222c.7 1.28.227 2.886-1.056 3.586-.4.221-.833.324-1.261.324z"></path>
    </g>
</svg>
</div></a>
                        </span>
                    )}
                </div>
                <div className={`side-menu ${menuOpen ? 'open' : ''}`}>
                    <div className="side-menu-container">
                    <div className="menu-content">
                        <div className="menu-content-upper">
                            <img src={photo} alt="Profile" className="profile-picture"/>
                            <p>Ing. arch. Anna Laubová</p>
                            <p>IČ: 08982279</p>
                            <p><a href="mailto:lauboann@gmail.com">lauboann@gmail.com</a></p>
                            <p><a href="https://annalaubova.com" target="_blank"
                                  rel="noopener noreferrer">annalaubova.com</a></p>
                            <p><a href="tel:+420607153114">+420 607 153 114</a></p>
                        </div>
                        <div className="menu-content-lower">
                            <p>Vidonín 21, 594 57 Vidonín</p>
                            <p>Štefánikova 229/5, 150 00 Praha 5</p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </header>
    );
};

export default NavBar;
