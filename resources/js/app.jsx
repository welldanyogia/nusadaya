import './bootstrap';
import '../css/app.css';

import {createRoot, hydrateRoot} from 'react-dom/client';
import {createInertiaApp} from '@inertiajs/react';
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';
import {BrowserRouter} from "react-router-dom";
import './Pages/Admin/Monitoring/Proyek/Dashboard.jsx';


const appName = import.meta.env.VITE_APP_NAME || 'SMAK-PLN  ';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.jsx`, import.meta.glob('./Pages/**/*.jsx')),
    setup({el, App, props}) {
        if (import.meta.env.DEV) {
            createRoot(el).render(
                <BrowserRouter>
                    <App {...props} />
                </BrowserRouter>
            );
            return
        }

        hydrateRoot(el, <BrowserRouter>
            <App {...props} />
        </BrowserRouter>);
    },
    progress: {
        color: '#57b5c6',
    },
});
