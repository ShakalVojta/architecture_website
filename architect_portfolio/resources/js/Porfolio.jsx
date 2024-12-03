import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import '../css/Porfolio.css';
import NavBar from './components/NavBar.jsx';
import Footer from './components/Footer.jsx';
import HomePage from './pages/HomePage.jsx';
import ProjectDetails from './components/ProjectDetails.jsx';
import LoginPage from "./components/LoginPage.jsx";
import ProtectedRoute from "./components/ProtectedRouter.jsx";
import ListProjects from "./admin/ListProjects.jsx";
import AddProject from "./admin/AddProject.jsx";
import SideBar from "./admin/SideBar.jsx";
import AdminNav from "./admin/AdminNav.jsx";
import EditProject from "./admin/EditProject.jsx";
import { AuthProvider } from './contexts/AuthContext';
import {TextUtilsProvider} from "./contexts/TextUtilsContext.jsx";

const AdminLayout = () => (
    <div className="admin-layout">
        <AdminNav />
        <div className="admin-container">
            <SideBar />
            <div className="admin-content">
                <Routes>
                    <Route path="/list" element={<ListProjects />} />
                    <Route path="/add" element={<AddProject />} />
                    <Route path="/edit/:id" element={<EditProject />} />
                </Routes>
            </div>
        </div>
    </div>
);

const AuthSection = () => (
    <AuthProvider>
        <Routes>
            <Route path="/login" element={<LoginPage />} />
            <Route path="/admin/*" element={
                <ProtectedRoute>
                    <AdminLayout />
                </ProtectedRoute>
            } />
        </Routes>
    </AuthProvider>
);

const Portfolio = () => {
    return (
        <TextUtilsProvider>
            <Router>
                <Routes>
                    <Route path="/" element={
                        <>
                            <NavBar />
                            <HomePage />
                            <Footer />
                        </>
                    } />

                    <Route path="/projects/:id" element={
                        <>
                            <NavBar />
                            <ProjectDetails />
                            <Footer />
                        </>
                    } />

                    <Route path="/*" element={
                        <TextUtilsProvider>
                            <AuthSection />
                        </TextUtilsProvider>
                    } />
                </Routes>
            </Router>
        </TextUtilsProvider>
    );
};

export default Portfolio;
