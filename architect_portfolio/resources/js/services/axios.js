import axios from 'axios';

// Základní nastavení
const instance = axios.create({
    withCredentials: true,
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'Accept': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
    }
});

// Interceptor pro požadavky
instance.interceptors.request.use(
    async (config) => {
        if (!config.headers['Content-Type']?.includes('multipart/form-data')) {
            config.headers['Content-Type'] = 'application/json';
        }
        return config;
    },
    error => {
        return Promise.reject(error);
    }
);

instance.interceptors.response.use(
    response => response,
    async error => {
        if (error.response?.status === 401) {
            window.location.href = '/login';
        }
        if (error.response?.status === 419) {
            try {
                await axios.get('/sanctum/csrf-cookie');
                const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                if (token) {
                    error.config.headers['X-CSRF-TOKEN'] = token;
                    return instance(error.config);
                }
            } catch (retryError) {
                console.error('Failed to refresh CSRF token:', retryError);
            }
        }
        return Promise.reject(error);
    }
);

export default instance;
