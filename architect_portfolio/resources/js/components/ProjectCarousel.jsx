import React, { useState, useEffect } from 'react';
import { Carousel } from 'react-responsive-carousel';
import 'react-responsive-carousel/lib/styles/carousel.min.css';
import '../../css/ProjectCarousel.css';
import axios from 'axios';

const ProjectCarousel = ({ projectId }) => {
    const [images, setImages] = useState([]);
    const [selectedImage, setSelectedImage] = useState(null);

    useEffect(() => {
        axios.get(`/api/projects/${projectId}/images`)
            .then(response => {
                setImages(response.data); // Očekáváme pole obrázků z API
            })
            .catch(error => {
                console.error('There was an error fetching the project images!', error);
            });
    }, [projectId]);

    const handleImageClick = (image) => {
        setSelectedImage(image);
    };

    const closeModal = () => {
        setSelectedImage(null);
    };

    const stopPropagation = (e) => {
        e.stopPropagation();
    };

    if (!images || images.length === 0) {
        return <div>Žádné obrázky k dispozici.</div>;
    }

    return (
        <div className="project-carousel">
            <Carousel showThumbs={false} infiniteLoop={true} autoPlay={true}>
                {images.map((image, index) => (
                    <div key={index}>
                        <img
                            src={image}
                            alt={`Project Image ${index + 1}`}
                            className="carousel-image"
                            onClick={() => handleImageClick(image)}
                        />
                    </div>
                ))}
            </Carousel>

            {selectedImage && (
                <div className="modal" onClick={closeModal}>
                    <span className="close" onClick={closeModal}>&times;</span>
                    <div className="modal-content-wrapper" onClick={stopPropagation}>
                        <img className="modal-content" src={selectedImage} alt="Selected Project"/>
                    </div>
                </div>
            )}
        </div>
    );
};

export default ProjectCarousel;
