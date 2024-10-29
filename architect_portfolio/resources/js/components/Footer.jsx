import '../../css/Footer.css';
import React from 'react';

const Footer = () => {
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
