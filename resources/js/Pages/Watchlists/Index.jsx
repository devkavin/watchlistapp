import React, { useEffect } from 'react';

const WatchListIndex = ({ watchLists }) => {
    useEffect(() => {
        console.log(watchLists); // Check the structure of the data
    }, [watchLists]);

    return (
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
    );
};

export default WatchListIndex;
