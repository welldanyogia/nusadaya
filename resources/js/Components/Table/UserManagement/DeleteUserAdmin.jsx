import {
    AlertDialog,
    AlertDialogAction,
    AlertDialogCancel,
    AlertDialogContent,
    AlertDialogDescription,
    AlertDialogFooter,
    AlertDialogHeader,
    AlertDialogTitle,
    AlertDialogTrigger,
} from "@/Components/ui/alert-dialog"
import { Button } from "@/Components/ui/button"
import { useForm } from '@inertiajs/react'

export function DeleteUserAdmin({ data }) {
    const { delete: destroy, processing } = useForm()

    const handleDelete = () => {
        destroy(route('user-management.delete', data.original.id), {
            preserveScroll: true,
            onSuccess: () => {
                // Anda dapat menambahkan logika khusus di sini jika diperlukan, seperti menampilkan notifikasi toast
            },
            onError: (errors) => {
                // console.error(errors)
            },
        })
    }

    console.log(data.original)

    return (
        <AlertDialog>
            <AlertDialogTrigger asChild>
                <Button variant="destructive" >
                    Hapus
                </Button>
            </AlertDialogTrigger>
            <AlertDialogContent>
                <AlertDialogHeader>
                    <AlertDialogTitle>Apakah Anda yakin untuk menghapus {data.original.role.toUpperCase()} {data.original.username}?</AlertDialogTitle>
                    <AlertDialogDescription>
                        Tindakan ini tidak dapat dibatalkan. Ini akan menghapus alat kerja Anda secara permanen.
                    </AlertDialogDescription>
                </AlertDialogHeader>
                <AlertDialogFooter>
                    <AlertDialogCancel>Batal</AlertDialogCancel>
                    <AlertDialogAction
                        className={"bg-red-600"}
                        onClick={handleDelete}
                        disabled={processing}
                    >
                        {processing ? "Menghapus..." : "Lanjutkan"}
                    </AlertDialogAction>
                </AlertDialogFooter>
            </AlertDialogContent>
        </AlertDialog>
    )
}
