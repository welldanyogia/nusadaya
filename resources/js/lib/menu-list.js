import {
    Tag,
    Users,
    Settings,
    Bookmark,
    SquarePen,
    LayoutGrid,
    LineChartIcon,
    BoxesIcon,
    Monitor, UserPlus
} from 'lucide-react';

export function getMenuList(pathname, user) {
    const menuList = [
        {
            groupLabel: "",
            menus: [
                {
                    href: "/admin/dashboard",
                    label: "Dashboard",
                    active: pathname === "/admin/dashboard",
                    icon: LayoutGrid,
                    submenus: []
                }
            ]
        },
        {
            groupLabel: "Monitoring",
            menus: [
                {
                    href: "",
                    label: "Monitoring",
                    active: pathname.includes("/admin/dashboard/proyek") || pathname.includes('/admin/dashboard/alat-kerja') || pathname.includes('/admin/dashboard/tenaga-kerja'),
                    icon: Monitor,
                    submenus: [
                        {
                            href: "/admin/dashboard/proyek",
                            label: "Proyek",
                            active: pathname === "/admin/dashboard/proyek"
                        },
                        {
                            href: "/admin/dashboard/alat-kerja",
                            label: "Alat Kerja",
                            active: pathname === "/admin/dashboard/alat-kerja"
                        },
                        {
                            href: "/admin/dashboard/tenaga-kerja",
                            label: "Tenaga Kerja",
                            active: pathname === "/admin/dashboard/tenaga-kerja"
                        }
                    ]
                }
            ]
        }
    ];

    // Add "Tambah Admin/User" menu for non-user roles
    if (user.role !== 'user') {
        menuList.push({
            groupLabel: "Tambah Admin/User",
            menus: [
                {
                    href: "/admin/dashboard/user-management",
                    label: "Tambah Admin/User",
                    active: pathname.includes("/admin/dashboard/user-management"),
                    icon: UserPlus ,
                    submenus: []
                }
            ]
        });
    }

    return menuList;
}
