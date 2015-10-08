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

namespace spec\App;

use PhpSpec\ObjectBehavior;

class MovieSpec extends ObjectBehavior
{
    function it_should_be_a_great_movie()
    {
        // It compares return data with operator '==='

        // describe method App\Movie::getRating() should return '5' and type of data is integer, if not it will be failed
        $this->getRating()->shouldBe(5);

        // It should return "Star Wars"
        $this->getTitle()->shouldBeEqualTo("Star Wars");

        // It should return integer 233366400
        $this->getReleaseDate()->shouldReturn(233366400);

        // It should exact "Inexplicably popular children's film"
        $this->getDescription()->shouldEqual("Inexplicably popular children's film");
    }

    function it_comparison_match_test()
    {
    	// It compares return data with operator '=='

    	// describe method App\Movie::getRatingLike() should return 5 or "5", if not it will be failed
        $this->getRatingLike()->shouldBeLike(5);
    }

    function it_should_not_allow_negative_ratings()
    {
    	// It will be failed if method setRating is negatif number
    	// You can use ->during('setRating', [-3]);
    	// where first argument is method name and second argument is an array of values pass to the method
        $this->shouldThrow('\InvalidArgumentException')->duringSetRating(-3);
    }

    function it_should_be_a_movie()
    {
        // there must be App\Movie
        $this->shouldHaveType('App\Movie');
        // The App\Movie should return something
        $this->shouldReturnAnInstanceOf('App\Movie');
        // The App\Movie should instance App\MoviesInstance (just for sample)
        $this->shouldBeAnInstanceOf('App\MoviesInstance');
    }

    function it_should_be_available_on_cinemas()
    {
        // calls isAvailableOnCinemas() and its should return true to pass and it should be in App\Movie
        $this->shouldBeAvailableOnCinemas();
    }

    function it_should_have_soundtrack()
    {
        // calls hasSoundtrack() and its should return true to pass and it should be in App\Movie
        $this->shouldHaveSoundtrack();
    }
}
