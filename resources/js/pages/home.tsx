import { Button } from '@/components/ui/button';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { router } from '@inertiajs/react';
import { useState } from 'react';

const Home = ({ success, error }: { success?: string; error?: string }) => {
    const [isSending, setIsSending] = useState(false);

    const sendMail = () => {
        setIsSending(true);

        router.get(route('send-mail'), undefined, {
            preserveScroll: true,
            onSuccess: () => {
                setIsSending(false);
            },
            onError: () => {
                setIsSending(false);
            },
        });
    };

    return (
        <div className="mx-auto max-w-2xl p-12">
            <Card>
                <CardHeader>
                    <CardTitle>Mailpit Mail Test</CardTitle>
                    <CardDescription>This is a test of the Mailpit mail server.</CardDescription>
                </CardHeader>
                <CardContent>
                    <Button onClick={sendMail} disabled={isSending}>
                        {isSending ? 'Sending...' : 'Send Test Email'}
                    </Button>

                    <div className="mt-4">
                        {success && <p className="text-green-500">{success}</p>}
                        {error && <p className="text-red-500">{error}</p>}
                    </div>
                </CardContent>
            </Card>
        </div>
    );
};

export default Home;
