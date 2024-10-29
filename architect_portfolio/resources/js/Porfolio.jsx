import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import NavBar from './components/NavBar.jsx';
import Footer from './components/Footer.jsx';
import HomePage from './pages/HomePage.jsx';
import ProjectDetails from './components/ProjectDetails.jsx';
import LoginPage from "./components/LoginPage.jsx";
import ProtectedRoute from "./components/ProtectedRouter.jsx";
import AdminPage from "./pages/AdminPage.jsx";



const Portfolio = () => {
    return (
        <Router>
            <Routes>
                <Route
                    path="/"
                    element={
                        <>
                            <NavBar />
                            <HomePage />
                            <Footer />
                        </>
                    }
                />
                <Route
                    path="/projects/:id"
                    element={
                        <>
                            <NavBar />
                            <ProjectDetails />
                            <Footer />
                        </>
                    }
                />

                <Route path="/login" element={<LoginPage />} />

                <Route
                    path="/admin"
                    element={
                        <ProtectedRoute>
                            <AdminPage />
                        </ProtectedRoute>
                    }
                />
            </Routes>
        </Router>
    );
};

export default Portfolio;
