import { Button } from "@/Components/ui/button"
import {
    Dialog,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from "@/Components/ui/dialog"
import { Input } from "@/Components/ui/input"
import { Label } from "@/Components/ui/label"
import {useEffect, useState} from "react";
import {router, useForm} from "@inertiajs/react";
import {CategoryComboBox} from "@/Components/Table/Proyek/CategoryComboBox.jsx";
import {ProjectComboBox} from "@/Components/Table/AlatKerja/ProjectComboBox.jsx";
import {Select, SelectContent, SelectItem, SelectTrigger, SelectValue} from "@/Components/ui/select.jsx";

export function EditUserAdmin({data,auth}) {
    const [loading, setLoading] = useState(false);
    const [open, setOpen] = useState(false);
    const [category, setCategory] = useState([]);
    const [formData, setFormData] = useState({
        name: data.name,
        username: data.username,
        email: data.email,
        password: data.password,
        role: data.role,
    });

    // const fetchCategories = async () => {
    //     const response = await axios.post('/admin/monitoring/proyek/getCategory');
    //     setCategory(response.data);
    // };
    //
    // useEffect(() => {
    //     fetchCategories();
    // }, []);

    const handleChange = (e) => {
        const { name, value } = e.target;
        setFormData((prevData) => ({
            ...prevData,
            [name]: value,
        }));
    };

    // const handleProjectChange = (projects) => {
    //     if (projects && projects.id) {
    //         setFormData((prevData) => ({
    //             ...prevData,
    //             project_id: projects.id,
    //         }));
    //     }
    // };

    // const calculateContractDates = () => {
    //     const { tgl_kontrak, masa_pakai_saat_ini, akhir_kontrak: manualEndDate } = formData;
    //
    //     const effectiveDateString = convertDateFormat(tgl_kontrak);
    //     const manualEndDateString = manualEndDate ? convertDateFormat(manualEndDate) : null;
    //
    //     const effectiveDate = new Date(effectiveDateString);
    //     if (isNaN(effectiveDate)) return;
    //
    //     let endDate;
    //     if (masa_pakai_saat_ini) {
    //         const months = parseInt(masa_pakai_saat_ini, 10);
    //         endDate = new Date(effectiveDate);
    //         endDate.setMonth(effectiveDate.getMonth() + months);
    //     }
    //
    //     if (manualEndDateString) {
    //         const manualDate = new Date(manualEndDateString);
    //         if (!isNaN(manualDate)) {
    //             endDate = manualDate;
    //         }
    //     }
    //
    //     if (endDate && !isNaN(endDate)) {
    //         const formattedEndDate = endDate.toISOString().split("T")[0];
    //         const currentDate = new Date();
    //
    //         let sisaWaktuBulan = 0;
    //         let sisaWaktuHari = 0;
    //
    //         if (effectiveDate <= currentDate) {
    //             const diffTime = endDate - currentDate;
    //             const totalDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));
    //             sisaWaktuBulan = Math.floor(totalDays / 30);
    //             sisaWaktuHari = totalDays % 30;
    //         } else {
    //             const diffTime = endDate - effectiveDate;
    //             const totalDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));
    //             sisaWaktuBulan = Math.floor(totalDays / 30);
    //             sisaWaktuHari = totalDays % 30;
    //         }
    //
    //         setformData((prevData) => ({
    //             ...prevData,
    //             akhir_kontrak: formattedEndDate,
    //             status_sisa_jangka_waktu_kontrak_bulan: `${sisaWaktuBulan} bulan ${sisaWaktuHari} hari`,
    //         }));
    //     }
    // };
    //
    //
    //
    //
    //
    //
    // useEffect(() => {
    //     const previousStatus = formData.status_sisa_jangka_waktu_kontrak_bulan;
    //     calculateContractDates();
    //     if (previousStatus !== formData.status_sisa_jangka_waktu_kontrak_bulan) {
    //         // Logika untuk menangani jika status berubah
    //     }
    // }, [formData.tgl_kontrak, formData.masa_pakai_saat_ini]);



    const convertDateFormat = (dateString) => {
        const [day, month, year] = dateString.split('/');
        return `${year}-${month}-${day}`;
    };

    // Function to handle changes in input fields
    const handleInputChange = (e) => {
        const { id, value } = e.target;
        setFormData((prevData) => ({
            ...prevData,
            [id]: value,
        }));
    };
    // const validateForm = () => {
    //     const requiredFields = ['name', 'project_id', 'tgl_kontrak', 'masa_pakai'];
    //     for (const field of requiredFields) {
    //         if (!formData[field]) {
    //             alert(`${field} is required.`);
    //             return false;
    //         }
    //     }
    //     return true;
    // };

    const handleSubmit = async (e) => {
        e.preventDefault();
        // if (!validateForm()) return;
        // console.log("form data:",formData)

        setLoading(true);

        try {
            await router.post(`/admin/dashboard/user-management/update/${data.id}`, formData, {
                onFinish: () => {
                    setLoading(false);
                    setOpen(false);
                },
            });
            // console.log('Data alat kerja berhasil diperbarui');
        } catch (error) {
            // console.error('Error updating project:', error.response?.data || error.message);
        }
    };

    return (
        <Dialog open={open} onOpenChange={setOpen}>
            <DialogTrigger asChild>
                <Button variant="outline"
                        onClick={()=>{
                            // console.log("edit data :",formData)
                        }}
                        className={"bg-fountain-blue-400 text-white rounded-xl"}>Edit</Button>
            </DialogTrigger>
            <DialogContent
                className="mx-auto sm:max-w-[425px] lg:max-w-[800px] text-fountain-blue-400 max-h-[90vh] overflow-y-auto">
                <DialogHeader>
                    <DialogTitle className={"text-fountain-blue-400"}>Edit Admin/User</DialogTitle>
                    <DialogDescription>
                        Lakukan perubahan pada Admin/User Anda di sini. Klik simpan setelah selesai.
                    </DialogDescription>
                </DialogHeader>
                <form onSubmit={handleSubmit}>
                    <div className="grid gap-4 py-4">
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="name" className="text-right">
                                Nama
                            </Label>
                            <Input id="name"
                                   name="name"
                                   value={formData?.name || ""}
                                   onChange={handleChange}
                                   className="col-span-3 text-neutral-600"/>
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="username" className="text-right">
                                Username
                            </Label>
                            <Input id="username"
                                   name="username"
                                   value={formData?.username || ""}
                                   onChange={handleChange}
                                   className="col-span-3 text-neutral-600"/>
                            {/*<ProjectComboBox*/}
                            {/*    projects={projects}*/}
                            {/*    project_id={formData.project_id}*/}
                            {/*    onProjectChange={handleProjectChange}*/}
                            {/*    />*/}
                            {/*<Input id="username"*/}
                            {/*       name="username"*/}
                            {/*       value={formData?.username || ""}*/}
                            {/*       onChange={handleInputChange}*/}
                            {/*       className="col-span-3 text-neutral-600"/>*/}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="email" className="text-right">
                                Email
                            </Label>
                            <Input id="email"
                                   value={formData?.email ? formData.email : ""}
                                   onChange={handleInputChange}
                                   className="col-span-3 text-neutral-600"/>
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="password" className="text-right">
                                Password
                            </Label>
                            <Input id="password"
                                   value={formData?.password || ""}
                                   onChange={handleInputChange}
                                   className="col-span-3 text-neutral-600"/>
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="role"
                                   className="text-right">
                                Role
                            </Label>
                            <Select
                                value={formData?.role}
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
                        </div>
                    </div>
                </form>
                    <DialogFooter>
                        <Button type="submit" className={"bg-fountain-blue-400"} onClick={handleSubmit} disabled={loading}>
                            {loading ? "Memperbarui..." : "Simpan Perubahan"}
                        </Button>
                    </DialogFooter>
            </DialogContent>
        </Dialog>
)
}
