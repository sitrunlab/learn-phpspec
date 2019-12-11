<?php

/**
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

declare(strict_types=1);

namespace App;

class Movie
{
    public function getRating() : int
    {
        return 5;
    }

    public function getRatingLike() : string
    {
        return '5';
    }

    public function getTitle() : string
    {
        return 'The Wizard of Dragon';
    }

    public function getReleaseDate() : int
    {
        return 233366400;
    }

    public function getDescription() : string
    {
        return "Inexplicably popular children's film";
    }

    public function setRating(int $rating) : int
    {
        if ($rating < 0) {
            throw new Exception\InvalidArgumentException('Error Processing Request');
        }

        return $rating;
    }

    public function isAvailableOnCinemas() : bool
    {
        return true;
    }

    public function hasSoundtrack() : bool
    {
        return true;
    }

    /** @return array<string> */
    public function getDirectors() : array
    {
        return ['Director one', 'Director two', 'Director three', 'Director four'];
    }

    /** @return array<string> */
    public function getCast() : array
    {
        return ['leadRole' => 'Jane Smith'];
    }

    /** @return array<array> */
    public function getReleaseDates() : array
    {
        return ['France' => ['date' => 'Oct 31, 2015']];
    }
}
