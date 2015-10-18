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
use App\Markdown;
use App\WriterInterface;
use App\ReaderInterface;

class MarkdownSpec extends ObjectBehavior
{
    public function let(WriterInterface $writer, ReaderInterface $reader)
    {
        $this->beConstructedWith($writer, $reader);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Markdown::class);
    }

    public function it_outputs_converted_text($writer)
    {
        // Describe method App\WriterInterface::writeText() should called before example
        $writer->writeText('Hi, there')->shouldBeCalled();

        // when
        $this->outputHtml('Hi, there');
    }

    public function it_construct_via_factory_method($writer, $reader)
    {
        // call constructor through method create
        $this->beConstructedThrough('create', [$writer, $reader]);

        $reader->getMarkdown()->willReturn('<p>Hi, there!</p>')->shouldBeCalled();
        $this->toHtmlFromReader()->shouldReturn('<p>Hi, there!</p>');
    }
}
