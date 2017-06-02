<?php
declare(strict_types=1);

use Emilybache\YatzyRefactoringKata\Yatzy;
use PHPUnit\Framework\TestCase;

class YatzyTest extends TestCase {

	/** @test */
	public function chance_scores_sum_of_all_dice() {
		$expected = 15;
		$actual = Yatzy::chance(2,3,4,5,1);
		$this->assertSame($expected, $actual);
		$this->assertSame(16, Yatzy::chance(3,3,4,5,1));
	}

	/** @test */
	public function yatzy_scores_50() {
		$expected = 50;
		$actual = Yatzy::yatzy(4,4,4,4,4);
		$this->assertSame($expected, $actual);
		$this->assertSame(50, Yatzy::yatzy(6,6,6,6,6));
		$this->assertSame(0, Yatzy::yatzy(6,6,6,6,3));
	}

	public function test_1s() {
		$this->assertTrue(Yatzy::ones(1,2,3,4,5) == 1);
		$this->assertSame(2, Yatzy::ones(1,2,1,4,5));
		$this->assertSame(0, Yatzy::ones(6,2,2,4,5));
		$this->assertSame(4, Yatzy::ones(1,2,1,1,1));
	}

	public function test_2s() {
		$this->assertSame(4, Yatzy::twos(1,2,3,2,6));
		$this->assertSame(10, Yatzy::twos(2,2,2,2,2));
	}

	public function test_threes() {
		$this->assertSame(6, Yatzy::threes(1,2,3,2,3));
		$this->assertSame(12, Yatzy::threes(2,3,3,3,3));
	}

	/** @test */
	public function fours_test()
	{
		$this->assertSame(12, (new Yatzy(4,4,4,5,5))->fours());
		$this->assertSame(8, (new Yatzy(4,4,5,5,5))->fours());
		$this->assertSame(4, (new Yatzy(4,5,5,5,5))->fours());
	}

	/** @test */
	public function fives() {
		$this->assertSame(10, (new Yatzy(4,4,4,5,5))->fives());
		$this->assertSame(15, (new Yatzy(4,4,5,5,5))->fives());
		$this->assertSame(20, (new Yatzy(4,5,5,5,5))->fives());
	}

	/** @test */
	public function sixes_test() {
		$this->assertEquals(0, (new Yatzy(4,4,4,5,5))->sixes());
		$this->assertEquals(6, (new Yatzy(4,4,6,5,5))->sixes());
		$this->assertEquals(18, (new Yatzy(6,5,6,6,5))->sixes());
	}

	/** @test */
	public function one_pair() {
		$this->assertEquals(6, Yatzy::score_pair(3,4,3,5,6));
		$this->assertEquals(10, Yatzy::score_pair(5,3,3,3,5));
		$this->assertEquals(12, Yatzy::score_pair(5,3,6,6,5));
	}

	/** @test */
	public function two_Pair() {
		$this->assertEquals(16, Yatzy::two_pair(3,3,5,4,5));
		$this->assertEquals(16, Yatzy::two_pair(3,3,5,5,5));
	}

    /** @test */
    public function three_of_a_kind()
    {
        $this->assertEquals(9, Yatzy::three_of_a_kind(3,3,3,4,5));
        $this->assertEquals(15, Yatzy::three_of_a_kind(5,3,5,4,5));
        $this->assertEquals(9, Yatzy::three_of_a_kind(3,3,3,3,5));
    }

    /** @test */
    public function four_of_a_knd() {
        $this->assertEquals(12, Yatzy::four_of_a_kind(3,3,3,3,5));
        $this->assertEquals(20, Yatzy::four_of_a_kind(5,5,5,4,5));
        $this->assertEquals(9, Yatzy::three_of_a_kind(3,3,3,3,3));
    }

    /** @test */
    public function smallStraight() {
        $this->assertEquals(15, Yatzy::smallStraight(1,2,3,4,5));
        $this->assertEquals(15, Yatzy::smallStraight(2,3,4,5,1));
        $this->assertEquals(0, Yatzy::smallStraight(1,2,2,4,5));
    }

    /** @test */
    public function largeStraight() {
        $this->assertEquals(20, Yatzy::largeStraight(6,2,3,4,5));
        $this->assertEquals(20, Yatzy::largeStraight(2,3,4,5,6));
        $this->assertEquals(0, Yatzy::largeStraight(1,2,2,4,5));
    }

    /** @test */
    public function fullHouse() {
        $this->assertEquals(18, Yatzy::fullHouse(6,2,2,2,6));
        $this->assertEquals(0, Yatzy::fullHouse(2,3,4,5,6));
    }
}
