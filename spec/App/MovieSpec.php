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

use App\Movie;
use PhpSpec\ObjectBehavior;

class MovieSpec extends ObjectBehavior
{
    public function it_should_be_a_great_movie()
    {
        // It compares return data with operator '==='

        // describe method App\Movie::getRating() should return '5' and type of data is integer, if not it will be failed
        $this->getRating()->shouldBe(5);

        // It should return "Star Wars"
        $this->getTitle()->shouldBeEqualTo('The Wizard of Dragon');

        // It should return integer 233366400
        $this->getReleaseDate()->shouldReturn(233366400);

        // It should exact "Inexplicably popular children's film"
        $this->getDescription()->shouldEqual('Inexplicably popular children\'s film');
    }

    public function it_comparison_match_test()
    {
        // It compares return data with operator '=='

        // describe method App\Movie::getRatingLike() should return 5 or "5", if not it will be failed
        $this->getRatingLike()->shouldBeLike(5);
    }

    public function it_should_not_allow_negative_ratings()
    {
        // It will be failed if method setRating is negative number
        // You can use ->during('setRating', [-3]);
        // where first argument is method name and second argument is an array of values pass to the method
        $this->shouldThrow('App\Exception\InvalidArgumentException')->duringSetRating(-3);
    }

    public function it_should_be_a_movie()
    {
        // there must be App\Movie
        $this->shouldHaveType(Movie::class);
        // The App\Movie should return something
        $this->shouldReturnAnInstanceOf(Movie::class);
        $this->shouldBeAnInstanceOf(Movie::class);
    }

    public function it_should_be_available_on_cinemas()
    {
        // calls isAvailableOnCinemas() and its should return true to pass and it should be in App\Movie
        $this->shouldBeAvailableOnCinemas();
    }

    public function it_should_have_soundtrack()
    {
        // calls hasSoundtrack() and its should return true to pass and it should be in App\Movie
        $this->shouldHaveSoundtrack();
    }

    public function it_should_have_one_director()
    {
        // for example you can return array type 4 items in array. (see src/App/Movie.php)
        $this->getDirectors()->shouldHaveCount(4);
    }

    public function it_should_have_a_string_as_title()
    {
        // To specify that the value returned by a method should be a specific primitive type you can use the Scalar matcher.
        // for example method getTitle() should return a string, if not it will be failed.
        $this->getTitle()->shouldBeString();
    }

    public function it_should_contain_jane_smith_in_the_cast()
    {
        // specify that a method should return an array that contains a given value with the ArrayContain matcher.
        // for example : method getCast() will return an array, in this array should contain value "Jane Smith", if not it will be failed.
        $this->getCast()->shouldContain('Jane Smith');
    }

    public function it_should_have_jane_smith_in_the_cast_with_a_lead_role()
    {
        // This matcher lets you assert a specific value for a specific key on a method that returns an array or an implementor of ArrayAccess.
        $this->getCast()->shouldHaveKeyWithValue('leadRole', 'Jane Smith');
    }

    public function it_should_have_a_release_date_for_france()
    {
        // You can specify that a method should return an array or an ArrayAccess object with a specific key using the ArrayKey matcher.
        // key is case sensitive
        $this->getReleaseDates()->shouldHaveKey('France');
    }

    public function it_should_have_a_title_that_starts_with_the_wizard()
    {
        // The StringStarts matcher lets you specify that a method should return a string starting with a given substring.
        // value is case sensitive
        $this->getTitle()->shouldStartWith('The Wizard');
    }

    public function it_should_have_a_title_that_ends_with_of_dragon()
    {
        // The StringEnd matcher lets you specify that a method should return a string ending with a given substring.
        // value is case sensitive
        $this->getTitle()->shouldEndWith('of Dragon');
    }

    public function it_should_have_a_title_that_contains_wizard()
    {
        // The StringRegex matcher lets you specify that a method should return a string matching a given regular expression.
        // for example getTitle() should contain word 'dragon'
        $this->getTitle()->shouldMatch('/dragon/i');
    }
}
