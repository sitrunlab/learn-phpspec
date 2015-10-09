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
        $this->shouldBeAnInstanceOf('App\Movie');
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

    function it_should_have_one_director()
    {
        // You can check the number of items in the return value using the Count matcher. 
        // for example you can return array type 4 items in array. (see src/App/Movie.php)
        $this->getDirectors()->shouldHaveCount(4);
    }

    function it_should_have_a_string_as_title()
    {
        // To specify that the value returned by a method should be a specific primitive type you can use the Scalar matcher.
        // for example method getTitle() should return a string, if not it will be failed.
        $this->getTitle()->shouldBeString();
    }

    function it_should_contain_jane_smith_in_the_cast()
    {
        // specify that a method should return an array that contains a given value with the ArrayContain matcher.
        // for example : method getCast() will return an array, in this array should contain value "Jane Smith", if not it will be failed.
        $this->getCast()->shouldContain('Jane Smith');
    }
}
