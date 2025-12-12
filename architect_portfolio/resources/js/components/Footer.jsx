import '../../css/Footer.css';
import React, { useState, useEffect } from 'react';
import { useLocation } from 'react-router-dom';

const Footer = () => {
    const [visible, setVisible] = useState(false);
    const location = useLocation();

    useEffect(() => {
        // Skryjeme footer při každé změně cesty
        setVisible(false);

        // Znovu zobrazíme po zpoždění
        const timer = setTimeout(() => {
            setVisible(true);
        }, 1000);

        return () => clearTimeout(timer);
    }, [location.pathname]);

    if (!visible) return null;

    return (
        <footer className="footer">
            <div className="footer-left">
                <p>Ing. arch. Anna Laubová</p>
            </div>
            <div className="footer-center">
                <p><a href="mailto:lauboann@gmail.com">lauboann@gmail.com</a></p>
            </div>
            <div className="footer-right">
                <p><a href="tel:+420607153114">+420 607 153 114</a></p>
            </div>
        </footer>
    );
};

export default Footer;
