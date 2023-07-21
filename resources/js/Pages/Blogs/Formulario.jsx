import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function Formulario({ auth }) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Formulario</h2>}
        >
            <Head title="Formulario" />

            <div className="py-12">
                Este es el componente de formulario ....
            </div>
        </AuthenticatedLayout>
    );
}
