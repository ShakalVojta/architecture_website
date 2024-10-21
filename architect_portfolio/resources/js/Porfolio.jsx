import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import NavBar from './components/NavBar.jsx';
import Footer from './components/Footer.jsx';
import HomePage from './pages/HomePage.jsx';
import ProjectDetails from './components/ProjectDetails.jsx';

const Portfolio = () => {
    return (
        <Router>
            <NavBar />
            <Routes>
                <Route path="/" element={<HomePage />} />
                <Route path="/projects/:id" element={<ProjectDetails />} />
            </Routes>
            <Footer />
        </Router>
    );
};

export default Portfolio;
