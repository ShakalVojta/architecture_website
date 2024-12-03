import { useState, useEffect } from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import axios from '../services/axios';
import '../../css/admin/EditProject.css';

const EditProject = () => {
    const { id } = useParams();
    const navigate = useNavigate();
    const [currentImages, setCurrentImages] = useState([]);
    const [currentGalleryImages, setCurrentGalleryImages] = useState([]);
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

    const [currentCoverImage, setCurrentCoverImage] = useState('');

    useEffect(() => {
        axios.get(`/api/projects/${id}`)
            .then(response => {

                const coverImagePath = response.data.cover_image?.replace('storage/app/public/', 'storage/');
                setCurrentCoverImage(coverImagePath || '');

                const processedData = Object.keys(response.data).reduce((acc, key) => {
                    if (key === 'cover_image') {
                        acc[key] = null;
                    } else if (key === 'images') {
                        acc[key] = [];
                    } else {
                        acc[key] = response.data[key] ?? '';
                    }
                    return acc;
                }, {});

                setFormData(processedData);

                return axios.get(`/api/projects/${id}/images`);
            })
            .then(imagesResponse => {
                if (imagesResponse && imagesResponse.data) {
                    setCurrentImages(imagesResponse.data);
                }
            })
            .catch(error => {
                console.error('Error fetching project:', error);
                alert('Chyba při načítání projektu');
            });
    }, [id]);

    const handleInputChange = (e) => {
        const { name, value } = e.target;
        setFormData(prev => ({
            ...prev,
            [name]: value || ''
        }));
    };

    const handleCoverImageChange = (e) => {
        const file = e.target.files[0];
        if (file) {
            setFormData(prev => ({
                ...prev,
                cover_image: file
            }));
        }
    };

    const handleImagesChange = (e) => {
        const files = e.target.files ? Array.from(e.target.files) : [];
        setFormData(prev => ({
            ...prev,
            images: files
        }));
    };

    const handleSubmit = async (e) => {
        e.preventDefault();

        try {
            const updateData = {
                title: formData.title,
                full_title: formData.full_title,
                location: formData.location,
                author: formData.author,
                phase: formData.phase,
                rating: formData.rating,
                project_type: formData.project_type,
                annotation: formData.annotation,
                description: formData.description,
                scope_of_work: formData.scope_of_work,
                date: formData.date
            };

            const response = await axios.put(`/api/projects/${id}`, updateData);

            if (response.data) {
                alert('Projekt byl úspěšně aktualizován!');
                await handleImageUpload();
                navigate('/admin/list');
            }

        } catch (error) {
            console.error('Chyba při aktualizaci projektu:', error);
            if (error.response?.data?.errors) {
                const errorMessages = Object.values(error.response.data.errors).flat();
                alert('Chyba při validaci: ' + errorMessages.join('\n'));
            } else {
                alert('Došlo k chybě při aktualizaci projektu: ' + error.message);
            }
        }
    };

    const handleImageUpload = async () => {
        try {
            const formDataObj = new FormData();

            if (formData.cover_image) {
                formDataObj.append('cover_image', formData.cover_image);
            }

            if (formData.images && formData.images.length > 0) {
                formData.images.forEach((image, index) => {
                    formDataObj.append(`images[${index}]`, image);
                });
            }

            for (let pair of formDataObj.entries()) {
                console.log(`${pair[0]}:`, pair[1]);
            }

            const response = await axios.post(`/api/projects/${id}/images`, formDataObj, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            });

            if (response.data) {
                alert('Obrázky byly úspěšně nahrány!');
            }

        } catch (error) {
            console.error('Chyba při nahrávání obrázků:', error);
            alert('Došlo k chybě při nahrávání obrázků: ' + error.message);
        }
    };

    const handleDeleteImage = async (imageId) => {
        if (window.confirm('Opravdu chcete smazat tento obrázek?')) {
            try {
                await axios.delete(`/api/projects/${id}/images/${imageId}`);
                setCurrentImages(prevImages =>
                    prevImages.filter((_, index) => index !== imageId)
                );
            } catch (error) {
                console.error('Error deleting image:', error);
                alert('Došlo k chybě při mazání obrázku');
            }
        }
    }
    console.log('Current Images:', currentImages);

    return (
        <div className="edit-project">
            <h2>Upravit projekt</h2>
            <form onSubmit={handleSubmit}>
                <div className="form-group">
                    <label>Název projektu pro úvodní stránku:</label>
                    <input
                        type="text"
                        name="title"
                        value={formData.title || ''}
                        onChange={handleInputChange}
                        required
                    />
                </div>

                <div className="form-group">
                    <label>Celý název projektu:</label>
                    <input
                        type="text"
                        name="full_title"
                        value={formData.full_title || ''}
                        onChange={handleInputChange}
                        required
                    />
                </div>

                <div className="form-group">
                    <label>Lokalita:</label>
                    <input
                        type="text"
                        name="location"
                        value={formData.location || ''}
                        onChange={handleInputChange}
                    />
                </div>

                <div className="form-group">
                    <label>Autor:</label>
                    <input
                        type="text"
                        name="author"
                        value={formData.author || ''}
                        onChange={handleInputChange}
                    />
                </div>

                <div className="form-group">
                    <label>Fáze projektu:</label>
                    <input
                        type="text"
                        name="phase"
                        value={formData.phase || ''}
                        onChange={handleInputChange}
                    />
                </div>

                <div className="form-group">
                    <label>Hodnocení:</label>
                    <input
                        type="text"
                        name="rating"
                        value={formData.rating || ''}
                        onChange={handleInputChange}
                    />
                </div>

                <div className="form-group">
                    <label>Typ projektu:</label>
                    <input
                        type="text"
                        name="project_type"
                        value={formData.project_type || ''}
                        onChange={handleInputChange}
                    />
                </div>

                <div className="form-group">
                    <label>Anotace:</label>
                    <textarea
                        name="annotation"
                        value={formData.annotation || ''}
                        onChange={handleInputChange}
                        rows="4"
                    />
                </div>

                <div className="form-group">
                    <label>Popis:</label>
                    <textarea
                        name="description"
                        value={formData.description || ''}
                        onChange={handleInputChange}
                        rows="6"
                    />
                </div>

                <div className="form-group">
                    <label>Rozsah práce:</label>
                    <input
                        type="text"
                        name="scope_of_work"
                        value={formData.scope_of_work || ''}
                        onChange={handleInputChange}
                    />
                </div>

                <div className="form-group">
                    <label>Datum:</label>
                    <input
                        type="date"
                        name="date"
                        value={formData.date || ''}
                        onChange={handleInputChange}
                    />
                </div>

                <div className="form-group">
                    <label>Současný úvodní obrázek:</label>
                    {currentCoverImage && (
                        <div className="current-image-preview">
                            <img
                                src={`/${currentCoverImage}`}
                                alt="Current cover"
                                style={{ maxWidth: '200px', height: 'auto' }}
                            />
                        </div>
                    )}

                    <label>Nahrát nový úvodní obrázek:</label>
                    <input
                        type="file"
                        name="cover_image"
                        onChange={handleCoverImageChange}
                        accept="image/*"
                    />
                    {formData.cover_image && (
                        <div className="image-preview">
                            <img
                                src={URL.createObjectURL(formData.cover_image)}
                                alt="New cover preview"
                            />
                        </div>
                    )}
                </div>

                <div className="form-group">
                    <label>Současná galerie:</label>
                    <div className="current-images-preview">
                        {currentImages.map((image, index) => (
                            <div key={index} className="image-container">
                                <img src={image.path} alt={`Current gallery ${index + 1}`} />
                                <button
                                    type="button"
                                    className="delete-image-btn"
                                    onClick={() => handleDeleteImage(image.id)}
                                >
                                    ×
                                </button>
                            </div>
                        ))}
                    </div>

                    <label>Přidat nové obrázky do galerie:</label>
                    <input
                        type="file"
                        name="images"
                        onChange={handleImagesChange}
                        accept="image/*"
                        multiple
                    />
                    <div className="image-preview">
                        {formData.images && formData.images.length > 0 && formData.images.map((image, index) => (
                            <img
                                key={index}
                                src={URL.createObjectURL(image)}
                                alt={`Preview ${index + 1}`}
                            />
                        ))}
                    </div>
                </div>

                <button type="submit">Uložit změny</button>
            </form>
        </div>
    );
};

export default EditProject;
