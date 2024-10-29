import AdminNav from "../admin/AdminNav.jsx";
import ProjectForm from "../admin/ProjectForm.jsx";
import AddProject from "../admin/AddProject.jsx";

const AdminPage = () => {
    return (
        <div>
            <AdminNav />
            <ProjectForm />
            <AddProject />
        </div>
    );
}

export default AdminPage;
