import { useState } from 'react';
import axios from '../services/axios.js';
import '../../css/admin/AddProject.css';

const AddProject = () => {
    const [formData, setFormData] = useState({
        title: '',
        full_title: '',
        location: '',
        author: '',
        phase: '',
        rating: '',
        project_type: '',
        annotation: '',
        description: '',
        scope_of_work: '',
        date: '',
        cover_image: null,
        images: []
    });

    const handleInputChange = (e) => {
        const { name, value } = e.target;
        setFormData(prev => ({
            ...prev,
            [name]: value
        }));
    };

    const handleFileChange = (e) => {
        const { name, files } = e.target;
        if (name === 'cover_image') {
            setFormData(prev => ({
                ...prev,
                cover_image: files[0]
            }));
        } else if (name === 'images') {
            setFormData(prev => ({
                ...prev,
                images: Array.from(files)
            }));
        }
    };

    const handleSubmit = async (e) => {
        e.preventDefault();

        try {
            const formDataToSend = new FormData();
            // Přidání všech textových polí
            Object.keys(formData).forEach(key => {
                if (key !== 'cover_image' && key !== 'images') {
                    formDataToSend.append(key, formData[key]);
                }
            });

            // Přidání souborů
            if (formData.cover_image) {
                formDataToSend.append('cover_image', formData.cover_image);
            }

            formData.images.forEach((image, index) => {
                formDataToSend.append(`images[${index}]`, image);
            });

            await axios.post('/api/projects', formDataToSend, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });

            // Reset formuláře po úspěšném odeslání
            setFormData({
                title: '',
                full_title: '',
                location: '',
                author: '',
                phase: '',
                rating: '',
                project_type: '',
                annotation: '',
                description: '',
                scope_of_work: '',
                date: '',
                cover_image: null,
                images: []
            });

            alert('Projekt byl úspěšně přidán!');
        } catch (error) {
            console.error('Chyba při přidávání projektu:', error);
            alert('Došlo k chybě při přidávání projektu.');
        }
    };

    return (
        <div className="add-project">
            <h2>Přidat nový projekt</h2>
            <form onSubmit={handleSubmit}>
                <div className="form-group">
                    <label>Název projektu pro úvodní stránku:</label>
                    <input
                        type="text"
                        name="title"
                        value={formData.title}
                        onChange={handleInputChange}
                        required
                    />
                </div>

                <div className="form-group">
                    <label>Celý název projektu:</label>
                    <input
                        type="text"
                        name="full_title"
                        value={formData.full_title}
                        onChange={handleInputChange}
                        required
                    />
                </div>

                <div className="form-group">
                    <label>Lokalita:</label>
                    <input
                        type="text"
                        name="location"
                        value={formData.location}
                        onChange={handleInputChange}
                    />
                </div>

                <div className="form-group">
                    <label>Autor:</label>
                    <input
                        type="text"
                        name="author"
                        value={formData.author}
                        onChange={handleInputChange}
                    />
                </div>

                <div className="form-group">
                    <label>Fáze projektu:</label>
                    <input
                        type="text"
                        name="phase"
                        value={formData.phase}
                        onChange={handleInputChange}
                    />
                </div>

                <div className="form-group">
                    <label>Hodnocení:</label>
                    <input
                        type="text"
                        name="rating"
                        value={formData.rating}
                        onChange={handleInputChange}
                    />
                </div>

                <div className="form-group">
                    <label>Typ projektu:</label>
                    <input
                        type="text"
                        name="project_type"
                        value={formData.project_type}
                        onChange={handleInputChange}
                    />
                </div>

                <div className="form-group">
                    <label>Anotace:</label>
                    <textarea
                        name="annotation"
                        value={formData.annotation}
                        onChange={handleInputChange}
                        rows="4"
                    />
                </div>

                <div className="form-group">
                    <label>Popis:</label>
                    <textarea
                        name="description"
                        value={formData.description}
                        onChange={handleInputChange}
                        rows="6"
                    />
                </div>

                <div className="form-group">
                    <label>Rozsah práce:</label>
                    <input
                        type="text"
                        name="scope_of_work"
                        value={formData.scope_of_work}
                        onChange={handleInputChange}
                    />
                </div>

                <div className="form-group">
                    <label>Datum:</label>
                    <input
                        type="date"
                        name="date"
                        value={formData.date}
                        onChange={handleInputChange}
                    />
                </div>

                <div className="form-group">
                    <label>Úvodní obrázek:</label>
                    <input
                        type="file"
                        name="cover_image"
                        onChange={handleFileChange}
                        accept="image/*"
                    />
                </div>

                <div className="form-group">
                    <label>Galerie obrázků:</label>
                    <input
                        type="file"
                        name="images"
                        onChange={handleFileChange}
                        accept="image/*"
                        multiple
                    />
                </div>

                <button type="submit">Přidat projekt</button>
            </form>
        </div>
    );
};

export default AddProject;
