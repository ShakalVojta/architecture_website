import '../../css/admin/Sidebar.css';
import { NavLink } from "react-router-dom";
import Icon from '@mdi/react';
import { mdiPlus, mdiListBoxOutline, mdiFileEditOutline, mdiLogout, mdiSort } from '@mdi/js';
import { useAuth } from '../contexts/AuthContext';

const SideBar = () => {
    const { logout } = useAuth();

    return (
        <div className="sidebar">
            <div className="sidebar-options">
                <NavLink to="/admin/add" className="sidebar-option">
                    <Icon path={mdiPlus}
                          title="Přidat projekt"
                          size={1}
                          color="black"
                    />
                    <p>Přidat projekt</p>
                </NavLink>
                <NavLink to="/admin/list" className="sidebar-option">
                    <Icon path={mdiListBoxOutline}
                          title="Seznam projektů"
                          size={1}
                          color="black"
                    />
                    <p>Seznam projektů</p>
                </NavLink>
                <NavLink to="/admin/edit" className="sidebar-option">
                    <Icon path={mdiFileEditOutline}
                          title="Upravit projekt"
                          size={1}
                          color="black"
                    />
                    <p>Upravit projekt</p>
                </NavLink>
                <NavLink to="/admin/order" className="sidebar-option">
                    <Icon path={mdiSort} size={1} color="black" />
                    <p>Pořadí projektů</p>
                </NavLink>
            </div>
            <div className="sidebar-footer">
                <button onClick={logout} className="sidebar-option logout-button">
                    <Icon path={mdiLogout}
                          title="Odhlásit"
                          size={1}
                          color="black"
                    />
                    <p>Odhlásit</p>
                </button>
            </div>
        </div>
    );
};

export default SideBar;
