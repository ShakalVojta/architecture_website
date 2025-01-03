import { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { useAuth } from '../contexts/AuthContext';
import '../../css/LoginPage.css';

const LoginPage = () => {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [error, setError] = useState('');
    const navigate = useNavigate();
    const { login } = useAuth();

    const handleSubmit = async (e) => {
        e.preventDefault();
        setError('');

        try {
            await login({ email, password });
            navigate('/admin/list'); // nebo kam chcete po přihlášení přesměrovat
        } catch (err) {
            setError('Neplatné přihlašovací údaje');
        }
    };

    return (
        <div className="login-container">
            <div className="login-box">
                <h2>Přihlášení do administrace</h2>
                <form onSubmit={handleSubmit}>
                    {error && (
                        <div className="error-message">
                            {error}
                        </div>
                    )}
                    <div className="form-group">
                        <label htmlFor="email">Email:</label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            required
                            value={email}
                            onChange={(e) => setEmail(e.target.value)}
                        />
                    </div>
                    <div className="form-group">
                        <label htmlFor="password">Heslo:</label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            required
                            value={password}
                            onChange={(e) => setPassword(e.target.value)}
                        />
                    </div>
                    <button type="submit">Přihlásit se</button>
                </form>
            </div>
        </div>
    );
};

export default LoginPage;
