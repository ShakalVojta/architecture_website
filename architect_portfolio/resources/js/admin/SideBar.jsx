import '../../css/admin/Sidebar.css';
import {NavLink} from "react-router-dom";
import Icon from '@mdi/react';
import { mdiPlus, mdiListBoxOutline, mdiFileEditOutline } from '@mdi/js';

const SideBar = () => {
    return (
        <>
            <div className="sidebar">
                <div className="sidebar-options">
                    <NavLink to="/admin/add" className="sidebar-option">
                        <Icon path={mdiPlus}
                              title="User Profile"
                              size={1}
                              color="black"
                        />
                        <p>Přidat projekt</p>
                    </NavLink>
                    <NavLink to="/admin/list" className="sidebar-option">
                        <Icon path={mdiListBoxOutline}
                              title="User Profile"
                              size={1}
                              color="black"
                        />
                        <p>Seznam projektů</p>
                    </NavLink>
                    <NavLink to="/admin/edit" className="sidebar-option">
                        <Icon path={mdiFileEditOutline}
                              title="User Profile"
                              size={1}
                              color="black"
                        />
                        <p>Upravit projekt</p>
                    </NavLink>
                </div>
            </div>
        </>
    )
}
export default SideBar;
