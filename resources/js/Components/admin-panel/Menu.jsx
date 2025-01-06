import React from 'react';
import { Link, useNavigate } from 'react-router-dom';
import { Ellipsis, LogOut } from 'lucide-react';
import { cn } from '@/lib/utils';
import { getMenuList } from '@/lib/menu-list';
import { Button } from '@/Components/ui/button';
import { ScrollArea } from '@/Components/ui/scroll-area';
import { CollapseMenuButton } from './CollapseMenuButton.jsx';
import { Tooltip, TooltipTrigger, TooltipContent, TooltipProvider } from '@/Components/ui/tooltip';
import {router} from "@inertiajs/react";
// import { handleSignOut } from '../actions/signout';

export function Menu({ isOpen,user }) {
    const pathname = window.location.pathname;
    const menuList = getMenuList(pathname,user);
    const navigate = useNavigate();

    const handleSignOut = async () => {
        try {
            await router.post(route('logout'));
            // Inertia::navigate('/')
        } catch (error) {
            console.error('Error signing out:', error);
        }
    };

    return (
        <ScrollArea className="[&>div>div[style]]:!block bg-[#F7EEEE]" >
            <nav className="mt-8 h-full w-full bg-[#F7EEEE]">
                <ul className="flex flex-col min-h-[calc(100vh-48px-36px-16px-32px)] lg:min-h-[calc(100vh-32px-40px-32px)] items-start space-y-1 px-2">
                    {menuList.map(({ groupLabel, menus }, index) => (
                        <li className={cn("w-full", groupLabel ? "pt-5" : "")} key={index}>
                            {(isOpen && groupLabel) || isOpen === undefined ? (
                                <p className="text-sm font-medium text-muted-foreground px-4 pb-2 max-w-[248px] truncate">
                                    {groupLabel}
                                </p>
                            ) : !isOpen && isOpen !== undefined && groupLabel ? (
                                <TooltipProvider>
                                    <Tooltip delayDuration={100}>
                                        <TooltipTrigger className="w-full">
                                            <div className="w-full flex justify-center items-center">
                                                <Ellipsis className="h-5 w-5" />
                                            </div>
                                        </TooltipTrigger>
                                        <TooltipContent side="right">
                                            <p>{groupLabel}</p>
                                        </TooltipContent>
                                    </Tooltip>
                                </TooltipProvider>
                            ) : (
                                <p className="pb-2"></p>
                            )}
                            {menus.map(
                                ({ href, label, icon: Icon, active, submenus }, index) =>
                                    submenus.length === 0 ? (
                                        <div className="w-full" key={index}>
                                            <TooltipProvider disableHoverableContent>
                                                <Tooltip delayDuration={100}>
                                                    <TooltipTrigger asChild>
                                                        <Button
                                                            variant={active ? "secondary" : "ghost"}
                                                            onClick={()=>{
                                                                router.get(href)
                                                            }}
                                                            className={`w-full justify-start h-10 mb-1 hover:bg-[#B6D7DE] ${active ? "bg-fountain-blue-500/60 text-white" : ""}`}
                                                            // asChild
                                                        >
                                                            {/*<Link to={href}>*/}
                                                                    <span
                                                                        className={cn(isOpen === false ? "" : "mr-4")}
                                                                    >
                                                                      <Icon size={18} />
                                                                    </span>
                                                                <p
                                                                    className={cn(
                                                                        "max-w-[200px] truncate",
                                                                        isOpen === false
                                                                            ? "-translate-x-96 opacity-0"
                                                                            : "translate-x-0 opacity-100"
                                                                    )}
                                                                >
                                                                    {label}
                                                                </p>
                                                            {/*</Link>*/}
                                                        </Button>
                                                    </TooltipTrigger>
                                                    {isOpen === false && (
                                                        <TooltipContent side="right">
                                                            {label}
                                                        </TooltipContent>
                                                    )}
                                                </Tooltip>
                                            </TooltipProvider>
                                        </div>
                                    ) : (
                                        <div className="w-full" key={index}>
                                            <CollapseMenuButton
                                                icon={Icon}
                                                label={label}
                                                active={active}
                                                submenus={submenus}
                                                isOpen={isOpen}
                                            />
                                        </div>
                                    )
                            )}
                        </li>
                    ))}
                    <li className="w-full grow flex items-end">
                        <TooltipProvider disableHoverableContent>
                            <Tooltip delayDuration={100}>
                                <TooltipTrigger asChild>
                                    <Button
                                        onClick={() => {handleSignOut()}}
                                        variant="outline"
                                        className="w-full justify-center h-10 mt-5"
                                    >
                    <span className={cn(isOpen === false ? "" : "mr-4")}>
                      <LogOut size={18} />
                    </span>
                                        <p
                                            className={cn(
                                                "whitespace-nowrap",
                                                isOpen === false ? "opacity-0 hidden" : "opacity-100"
                                            )}
                                        >
                                            Sign out
                                        </p>
                                    </Button>
                                </TooltipTrigger>
                                {isOpen === false && (
                                    <TooltipContent side="right">Sign out</TooltipContent>
                                )}
                            </Tooltip>
                        </TooltipProvider>
                    </li>
                </ul>
            </nav>
        </ScrollArea>
    );
}
