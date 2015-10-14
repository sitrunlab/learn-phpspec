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
    public function it_is_initializable(WriterInterface $writer)
    {
        // Pass object into constructor
        $this->beConstructedWith($writer);

        $this->shouldHaveType(Markdown::class);
    }

    public function it_outputs_converted_text(WriterInterface $writer)
    {
        // Pass object into constructor
        $this->beConstructedWith($writer);

        // Describe method App\WriterInterface::writeText() should called before example
        $writer->writeText('Hi, there')->shouldBeCalled();

        // when
        $this->outputHtml('Hi, there', $writer);
    }

    public function it_converts_text_from_an_external_source(ReaderInterface $reader, WriterInterface $writer)
    {
        // call constructor through method createForWriting
        $this->beConstructedWith('createForWriting', [$writer]);

        // Pass object into constructor
        $this->beConstructedWith($writer);

        // Stub is a process in test that record info about function call.
        $reader->getMarkdown()->willReturn('<p>Hi, there!</p>');

        // Describe method toHtmlFromReader() must exact <p>Hi, there!</p> or will be return failed
        $this->toHtmlFromReader($reader)->shouldReturn('<p>Hi, there!</p>');
    }
}
