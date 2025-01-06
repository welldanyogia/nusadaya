import {useState, useEffect} from 'react';

export function CustomSuccessAlert({flash}) {
    // State to control the visibility of the alert
    const [visible, setVisible] = useState(true);

    // Automatically hide the alert after 8 seconds
    useEffect(() => {
        const timer = setTimeout(() => {
            setVisible(false);
        }, 8000); // 8 seconds

        return () => clearTimeout(timer);
    }, []);

    // Only render the alert if it's visible
    if (!visible) return null;

    return (
        <div
            id="dismiss-alert"
            className="fixed top-5 right-5 animate-bounce-once bg-teal-50 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 shadow-lg dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500 transition-transform duration-300 ease-in-out"
            role="alert"
            tabIndex="-1"
            aria-labelledby="hs-dismiss-button-label"
        >
            <div className="flex">
                {/*<div className="shrink-0">*/}
                {/*    <svg*/}
                {/*        className="shrink-0 w-6 h-6 mt-0.5"*/}
                {/*        xmlns="http://www.w3.org/2000/svg"*/}
                {/*        width="24"*/}
                {/*        height="24"*/}
                {/*        viewBox="0 0 24 24"*/}
                {/*        fill="none"*/}
                {/*        stroke="currentColor"*/}
                {/*        strokeWidth="2"*/}
                {/*        strokeLinecap="round"*/}
                {/*        strokeLinejoin="round"*/}
                {/*    >*/}
                {/*        <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>*/}
                {/*        <path d="m9 12 2 2 4-4"></path>*/}
                {/*    </svg>*/}
                {/*</div>*/}
                <div className="ms-2">
                    <h3 id="hs-dismiss-button-label" className="text-sm font-medium">
                        {flash.success}
                    </h3>
                </div>
                <div className="ps-3 ms-auto">
                    <div className="-mx-1.5 -my-1.5">
                        <button
                            type="button"
                            className="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:bg-teal-100 dark:bg-transparent dark:text-teal-600 dark:hover:bg-teal-800/50 dark:focus:bg-teal-800/50"
                            onClick={() => setVisible(false)} // Hide alert when clicked
                        >
                            <span className="sr-only">Dismiss</span>
                            <svg
                                className="shrink-0 w-4 h-4"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                strokeWidth="2"
                                strokeLinecap="round"
                                strokeLinejoin="round"
                            >
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    );
}
