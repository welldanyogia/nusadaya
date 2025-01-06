import {Head, router, useForm, usePage} from '@inertiajs/react';
import AuthenticatedAdmin from "@/Layouts/AuthenticatedAdminLayout.jsx";
import {SquareChartGantt, User, Users, Wrench} from 'lucide-react';
import Statistic from "@/Components/Statistic.jsx";
import {Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle} from "@/Components/ui/card.jsx";
import {StatisticChart} from "@/Components/StatisticChart.jsx";
import Table from "@/Components/Table/Dashboard/Table.jsx";
import {Label} from "@/Components/ui/label.jsx";
import {Input} from "@/Components/ui/input.jsx";
import {Button} from "@/Components/ui/button.jsx";
import {DialogFooter} from "@/Components/ui/dialog.jsx";
import {Select, SelectContent, SelectItem, SelectTrigger, SelectValue} from "@/Components/ui/select.jsx";
import {CustomSuccessAlert} from "@/Components/CustomSuccessAlert.jsx";
import {useState} from "react";
import TableAU from "@/Components/Table/UserManagement/TableAU.jsx";

export default function Dashboard({auth,users}) {
    const { flash } = usePage().props
    const { data, setData, post, reset, errors } = useForm({
        name: "",
        username: "",
        email: "",
        password: "",
        role: ""
    })
    const [newUser, setNewUser] = useState(null)
    const handleSubmit = (e) => {
        e.preventDefault();

        // Debugging: Log data sebelum dikirim
        console.log("Data yang akan dikirim:", data);

        post(route('user-management.store'), {
            onStart: () => {
                // Debugging: Log sebelum request dimulai
                // console.log("Request dimulai...");
            },
            onSuccess: (response) => {
                // Debugging: Log setelah sukses
                // console.log("Response sukses:", response);

                // Reset form setelah berhasil
                setNewUser(data)
                reset();
            },
            onError: (errors) => {
                // Debugging: Log error yang terjadi
                // console.error("Error terjadi:", errors);
            },
            onFinish: () => {
                // Debugging: Log setelah request selesai (baik sukses maupun error)
                // console.log("Request selesai.");
            },
        });
    };

    console.log(users)


    return (
        <AuthenticatedAdmin
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Tambah Admin/User</h2>}
        >
            <Head title="Tambah Admin/User"/>

            <div className="py-12 space-y-6">
                {
                    flash && (
                        <CustomSuccessAlert flash={flash}/>
                    )
                }
                {/*{flash && (*/}
                {/*    <div className="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">*/}
                {/*        <strong className="font-bold">Berhasil!</strong>*/}
                {/*        <span className="block sm:inline">{flash.success}</span>*/}
                {/*    </div>*/}
                {/*)}*/}
                <Card className={"bg-fountain-blue-400 shadow drop-shadow-lg max-w-7xl"}>
                    <CardHeader className={"text-white text-3xl max-sm:text-lg font-bold"}>
                       Tambah Admin/User
                    </CardHeader>
                </Card>
                <Card className={'shadow drop-shadow-lg max-w-7xl'}>
                    <CardContent className={'flex gap-6'}>
                        <div className="grid gap-4 py-4 w-1/2 max-sm:w-full">
                            <div className="grid grid-cols-4 items-center gap-4">
                                <Label htmlFor="name" className="text-right">Nama</Label>
                                <Input
                                    id="name"
                                    value={data.namw}
                                    onChange={(e) => setData("name", e.target.value)}
                                    className="col-span-3 text-neutral-600"
                                />
                                {errors.name && <span className="text-red-500">{errors.name}</span>}
                            </div>
                            <div className="grid grid-cols-4 items-center gap-4">
                                <Label htmlFor="username" className="text-right">Username</Label>
                                <Input
                                    id="username"
                                    value={data.username}
                                    onChange={(e) => setData("username", e.target.value)}
                                    className="col-span-3 text-neutral-600"
                                />
                                {errors.username && <span className="text-red-500">{errors.username}</span>}
                            </div>
                            <div className="grid grid-cols-4 items-center gap-4">
                                <Label htmlFor="email" className="text-right">Email</Label>
                                <Input
                                    id="email"
                                    value={data.email}
                                    onChange={(e) => setData("email", e.target.value)}
                                    className="col-span-3 text-neutral-600"
                                />
                                {errors.email && <span className="text-red-500">{errors.email}</span>}
                            </div>
                            <div className="grid grid-cols-4 items-center gap-4">
                                <Label htmlFor="password" className="text-right">Password</Label>
                                <Input
                                    id="password"
                                    value={data.password}
                                    onChange={(e) => setData("password", e.target.value)}
                                    className="col-span-3 text-neutral-600"
                                />
                                {errors.password && <span className="text-red-500">{errors.password}</span>}
                            </div>
                            <div className="grid grid-cols-4 items-center gap-4">
                                <Label htmlFor="role" className="text-right">Role</Label>
                                <Select
                                    onValueChange={(value) => setData("role", value)}
                                >
                                    <SelectTrigger id="role" className="col-span-3">
                                        <SelectValue placeholder="Pilih Role"/>
                                    </SelectTrigger>
                                    <SelectContent>
                                        <SelectItem
                                            value="admin"
                                            disabled={auth.user.role === 'admin'}
                                        >
                                            Admin
                                        </SelectItem>
                                        <SelectItem value="user">User</SelectItem>
                                    </SelectContent>
                                </Select>
                                {errors.role && <span className="text-red-500">{errors.role}</span>}
                            </div>
                        </div>
                        <div className="grid gap-4 py-4 w-1/2 max-sm:w-full max-sm:hidden">
                            {newUser && (
                                <Card className="shadow drop-shadow-lg max-w-7xl">
                                    <CardHeader>
                                        <CardTitle>Detail User Baru</CardTitle>
                                    </CardHeader>
                                    <CardContent className={'grid gap-2'}>
                                        <div className={'grid grid-cols-4 items-center gap-4'}>
                                            <div>
                                                <strong>Nama</strong>
                                            </div>
                                            <div>
                                                {newUser.name}
                                            </div>
                                        </div>
                                        <div className={'grid grid-cols-4 items-center gap-4'}>
                                            <div>
                                                <strong>Username</strong>
                                            </div>
                                            <div>
                                                {newUser.username}
                                            </div>
                                        </div>
                                        <div className={'grid grid-cols-4 items-center gap-4'}>
                                            <div>
                                                <strong>Email</strong>
                                            </div>
                                            <div>
                                                {newUser.email}
                                            </div>
                                        </div>
                                        <div className={'grid grid-cols-4 items-center gap-4'}>
                                            <div>
                                                <strong>Password</strong>
                                            </div>
                                            <div>
                                                {newUser.password}
                                            </div>
                                        </div>
                                        <div className={'grid grid-cols-4 items-center gap-4'}>
                                            <div>
                                                <strong>Role</strong>
                                            </div>
                                            <div>
                                                {newUser.role.toUpperCase()}
                                            </div>
                                        </div>
                                    </CardContent>
                                </Card>
                            )}
                        </div>
                    </CardContent>
                    <CardFooter className={'flex justify-end w-1/2 max-sm:w-full'}>
                        <Button type="submit" className={"bg-fountain-blue-400"}
                                onClick={handleSubmit}
                            // disabled={loading}
                        >
                        Tambah
                            {/*{loading ? "Memperbarui..." : "Simpan Perubahan"}*/}
                        </Button>
                    </CardFooter>
                </Card>
                {newUser && (
                    <Card className="shadow drop-shadow-lg max-w-7xl max-sm:block hidden">
                        <CardHeader>
                            <CardTitle>Detail User Baru</CardTitle>
                        </CardHeader>
                        <CardContent>
                            <p><strong>Nama:</strong> {newUser.name}</p>
                            <p><strong>Username:</strong> {newUser.username}</p>
                            <p><strong>Email:</strong> {newUser.email}</p>
                            <p><strong>Role:</strong> {newUser.role}</p>
                        </CardContent>
                    </Card>
                )}
                <Card className={"bg-fountain-blue-400 shadow drop-shadow-lg max-w-7xl"}>
                    <CardHeader className={"text-white text-3xl max-sm:text-lg font-bold"}>
                        Admin dan User
                    </CardHeader>
                    <CardContent className={'bg-white'}>
                        {/*<div className="max-w-7xl mx-auto -mt-28 sm:px-6 lg:px-8">*/}
                            <TableAU data={users} auth={auth}/>
                        {/*</div>*/}
                    </CardContent>
                </Card>
            </div>
        </AuthenticatedAdmin>
    );
}
