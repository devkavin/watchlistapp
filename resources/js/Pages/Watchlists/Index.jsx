
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import React, { useEffect } from 'react';


export default function WatchListIndex({ watchLists }) {
    useEffect(() => {
        console.log(watchLists); // Check the structure of the data
    }, [watchLists]);


    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Watchlists
                </h2>
            }
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            <div>
                                <h1>Your Watchlists</h1>

                                {watchLists.length > 0 ? (
                                    <div>
                                        {watchLists.map((watchList) => (
                                            <div key={watchList.id} className="watchlist">
                                                <h2>{watchList.name}</h2>
                                                <p>Created by: {watchList.name}</p>

                                                <h3>Movies:</h3>
                                                <ul>
                                                    {watchList.movies && watchList.movies.length > 0 ? (
                                                        watchList.movies.map((movie) => (
                                                            <li key={movie.id}>{movie.name}</li>
                                                        ))
                                                    ) : (
                                                        <p>No movies in this watchlist.</p>
                                                    )}
                                                </ul>
                                            </div>
                                        ))}
                                    </div>
                                ) : (
                                    <p>You don't have any watchlists yet.</p>
                                )}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
