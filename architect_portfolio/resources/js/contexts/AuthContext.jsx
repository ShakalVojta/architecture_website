import { createContext, useState, useContext, useEffect } from 'react';
import axios from '../services/axios';

const AuthContext = createContext(null);

export const AuthProvider = ({ children }) => {
    const [isAuthenticated, setIsAuthenticated] = useState(null);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        checkAuth();
    }, []);

    const checkAuth = async () => {
        if (window.location.pathname === '/login') {
            setLoading(false);
            return;
        }

        try {
            await axios.get('/sanctum/csrf-cookie');
            const response = await axios.get('/api/user');
            setIsAuthenticated(true);
        } catch (error) {
            setIsAuthenticated(false);
        } finally {
            setLoading(false);
        }
    };

    const login = async (credentials) => {
        try {
            // Získáme CSRF token před přihlášením
            await axios.get('/sanctum/csrf-cookie');
            await axios.post('/login', credentials);
            setIsAuthenticated(true);
            return true;
        } catch (error) {
            throw error;
        }
    };

    const logout = async () => {
        try {
            setIsAuthenticated(false);
            await axios.post('/api/logout');
            window.location.replace('/');
        } catch (error) {
            console.error('Chyba při odhlašování:', error);
            window.location.replace('/');
        }
    };

    return (
        <AuthContext.Provider value={{
            isAuthenticated,
            loading,
            login,
            logout,
            checkAuth
        }}>
            {children}
        </AuthContext.Provider>
    );
};

export const useAuth = () => {
    const context = useContext(AuthContext);
    if (!context) {
        throw new Error('useAuth must be used within an AuthProvider');
    }
    return context;
};
