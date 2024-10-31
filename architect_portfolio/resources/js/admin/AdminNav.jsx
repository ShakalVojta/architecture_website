import React from 'react';
import '../../css/admin/AdminNav.css';
import Photo from '../../../public/storage/architect.jpg';
import {useNavigate} from "react-router-dom";

const AdminNav = () => {
    const navigate = useNavigate();

    return (
        <div className="admin-nav">
            <div
                className="admin-nav-home"
                onClick={() => navigate('/admin')}
                style={{cursor: 'pointer'}}
            >
                Admin Dashboard
            </div>
            <img className='profile' src={Photo} alt="User photo"/>
        </div>
    );
};

export default AdminNav;
