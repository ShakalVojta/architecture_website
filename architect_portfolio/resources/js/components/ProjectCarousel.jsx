import React, { useState, useEffect } from 'react';
import { Carousel } from 'react-responsive-carousel';
import 'react-responsive-carousel/lib/styles/carousel.min.css';
import '../../css/ProjectCarousel.css';
import axios from 'axios';

const ProjectCarousel = ({ projectId }) => {
    const [images, setImages] = useState([]);
    const [selectedImage, setSelectedImage] = useState(null);
    const [slidePercent, setSlidePercent] = useState(33.33);
    const [key, setKey] = useState(0);

    useEffect(() => {
        axios.get(`/api/projects/${projectId}/images`)
            .then(response => {
                console.log('API response for images:', response.data);
                setImages(response.data);
            })
            .catch(error => {
                console.error('There was an error fetching the project images!', error);
            });
    }, [projectId]);

    useEffect(() => {
        const handleResize = () => {
            let newSlidePercent;
            if (window.innerWidth <= 768) {
                newSlidePercent = 100;
            } else if (window.innerWidth <= 1024) {
                newSlidePercent = 50;
            } else {
                newSlidePercent = 33.33;
            }

            if (newSlidePercent !== slidePercent) {
                setSlidePercent(newSlidePercent);
                setKey(prevKey => prevKey + 1);
            }
        };

        handleResize();

        let timeoutId = null;
        const throttledResize = () => {
            if (timeoutId === null) {
                timeoutId = setTimeout(() => {
                    timeoutId = null;
                    handleResize();
                }, 150);
            }
        };

        window.addEventListener('resize', throttledResize);
        return () => {
            window.removeEventListener('resize', throttledResize);
            if (timeoutId) clearTimeout(timeoutId);
        };
    }, [slidePercent]);

    const handleImageClick = (e, imagePath) => {
        e.preventDefault();
        e.stopPropagation();
        setSelectedImage(imagePath);
    };

    const closeModal = () => {
        setSelectedImage(null);
    };

    if (!images || images.length === 0) {
        return <div>Žádné obrázky k dispozici.</div>;
    }

    return (
        <div className="project-carousel">
            <Carousel
                key={key}
                showThumbs={false}
                infiniteLoop={false}
                autoPlay={false}
                showIndicators={true}
                showStatus={false}
                centerMode={true}
                centerSlidePercentage={slidePercent}
                emulateTouch={true}
                transitionTime={500}
                preventMovementUntilSwipeScrollTolerance={true}
                swipeScrollTolerance={50}
                useKeyboardArrows={true}
            >
                {images.map((image, index) => (
                    <div key={index} className="carousel-slide" onClick={(e) => handleImageClick(e, image.path)}>
                        <div className="image-container">
                            <img
                                src={image.path} // Zde použijte přímo image.path bez jakýchkoliv úprav
                                alt={`Project Image ${index + 1}`}
                                className="carousel-image"
                            />
                        </div>
                    </div>
                ))}
            </Carousel>

            {selectedImage && (
                <div className="modal" onClick={closeModal}>
                    <span className="close">&times;</span>
                    <div className="modal-content-wrapper">
                        <img
                            src={selectedImage} // Přímo URL bez úprav
                            alt="Selected Project"
                            className="modal-content"
                        />
                    </div>
                </div>
            )}
        </div>
    );
};

export default ProjectCarousel;
