import React, { Fragment } from "react";
import { Link, useLocation } from "react-router-dom";
import {
    Breadcrumb,
    BreadcrumbItem,
    BreadcrumbLink,
    BreadcrumbList,
    BreadcrumbSeparator
} from "@/Components/ui/breadcrumb";
import {router} from "@inertiajs/react";

const CustomBreadcrumb = ({ url }) => {
    const location = useLocation(); // Get current location from react-router-dom

    // Use url or fallback to the location pathname
    const currentUrl = url || location.pathname;

    // Split URL into segments
    const pathSegments = currentUrl.split("/").filter(Boolean);

    // Remove "admin" from the beginning of path segments if it exists
    const adjustedPathSegments = pathSegments[0] === "admin" ? pathSegments.slice(1) : pathSegments;

    // Regex untuk mendeteksi UUID (versi 4)
    const isUUID = (str) => {
        const regex = /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/i;
        return regex.test(str);
    };

    // Proses setiap segmen path
    const formattedSegments = adjustedPathSegments.map((segment, index) => {
        // Ganti "-" dengan spasi
        let formattedSegment = segment.replace(/-/g, " ");

        // Jika segmen adalah UUID, ganti dengan "Detail {segment sebelumnya}"
        if (isUUID(segment)) {
            formattedSegment = `Detail ${adjustedPathSegments[index - 1].replace(/-/g, " ") || ''}`; // segment sebelumnya
        }

        // Jika segmen adalah "monitoring", ganti dengan "dashboard"
        if (formattedSegment.toLowerCase() === "monitoring") {
            formattedSegment = "dashboard";
        }

        return formattedSegment;
    });


    return (
        <Breadcrumb>
            <BreadcrumbList>
                {formattedSegments.map((segment, index) => {
                    const href = "/admin"+"/" + formattedSegments.slice(0, index + 1).join("/").replace(/ /g, "-");
                    const isLast = index === formattedSegments.length - 1;

                    console.log(href)
                    return (
                        <Fragment key={href}>
                            <BreadcrumbItem>
                                {!isLast ? (
                                    <Link
                                        onClick={() => {
                                            router.get(href); // Gunakan router.get untuk menghindari reload halaman
                                        }}
                                        className="hover:underline capitalize text-fountain-blue-400"
                                        to={href}
                                    >
                                        {segment} {/* Menampilkan segmen yang sudah diformat */}
                                    </Link>
                                ) : (
                                    <span className="font-semibold capitalize text-fountain-blue-400">
                                        {segment} {/* Menampilkan segmen terakhir yang sudah diformat */}
                                    </span>
                                )}
                            </BreadcrumbItem>
                            {!isLast && <BreadcrumbSeparator />} {/* Separator hanya jika bukan segmen terakhir */}
                        </Fragment>
                    );
                })}
            </BreadcrumbList>
        </Breadcrumb>
    );
};

export default CustomBreadcrumb;
